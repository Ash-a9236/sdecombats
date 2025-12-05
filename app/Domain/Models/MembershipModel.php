<?php

namespace App\Domain\Models;

use App\Helpers\Core\PDOService;
use App\Domain\Models\LockerModel;

class MembershipModel extends BaseModel
{
    public function __construct(PDOService $db_service)
    {
        parent::__construct($db_service);
    }

    /**
     * Create a membership for a user in the database
     * @param array $data An array containing the type of the locker (Can be SMALL, MEDIUM or BIG), if the membership includes bow rental, and the duration of the membership (Can be 1, 3, 6 or 12 months)
     * @param int $user_id The user ID of the user who is subscribing to a membership
     * @param string $name The name of the user
     * @return int Returns 200 if the membership has successfully been created and 500 if not
     */
    public function createMembership(array $data, int $user_id, string $name, bool $locker)
    {
        if ($locker) {
            $locker_id = $this->searchAvailableLocker($data['type']);

            if ($locker_id == 303) {
                return 303;
            } else {
                $this->assignLockerToUser($locker_id, $name);
            }

            $sql = "INSERT INTO membership (locker_id, bow_rental, end) VALUES (?, ?, ?)";

            $this->execute($sql, [
                $locker_id,
                $data['bow_rental'],
                "DATE_ADD(CURRENT_DATE(), INTERVAL {$data['duration']} MONTH)"
            ]);
        } else {
            $sql = "INSERT INTO membership (bow_rental, end) VALUES (?, ?)";

            $this->execute($sql, [
                $data['bow_rental'],
                "DATE_ADD(CURRENT_DATE(), INTERVAL {$data['duration']} MONTH)"
            ]);
        }

        $membership_id = $this->lastInsertMembershipId();

        $sql = "UPDATE users SET membership_id = ? WHERE user_id = ?";

        $this->execute($sql, [
            $membership_id,
            $user_id
        ]);

        $sql = "SELECT membership_id FROM users WHERE user_id = ?";
        $data = $this->selectOne($sql, [$user_id]);

        if ($data['membership_id'] != $membership_id) {
            return 500;
        } else {
            return $membership_id;
        }
    }

    /**
     * Look for the next available locker of a certain size
     * @param string $type The size of the locker
     * @return int The locker ID if a locker was found or an error code if no locker was found
     */
    public function searchAvailableLocker(string $type): int
    {
        $sql = "SELECT locker_id FROM locker WHERE type = ? AND name = \"UNASSIGNED\" LIMIT 1";

        $locker = $this->selectOne($sql, [$type]);

        //! TEMPORARY ERROR CODE
        if ($locker == false ||  empty($locker) || $locker == null) {
            return 303;
        } else {
            return $locker['locker_id'];
        }
    }

    /**
     * Assigns a locker to a user
     * @param int $locker_id The locker ID
     * @param string $name The name of the user
     * @return int Returns 200 if the locker was successfully assigned and 500 if not
     */
    public function assignLockerToUser(int $locker_id, string $name)
    {
        $sql = 'UPDATE locker SET name = ? WHERE locker_id = ?';

        $this->execute($sql, [
            $name,
            $locker_id
        ]);

        $sql = "SELECT * FROM locker WHERE locker_id = ?";
        $locker = $this->selectOne($sql, [$locker_id]);

        if ($locker['name'] == $name) {
            return 200;
        } else {
            return 500;
        }
    }

    /**
     * Unassigns a locker from a user
     * @param int $locker_id The locker ID
     * @return int Returns 200 if the locker has successfully been unassigned and 500 if not
     */
    public function unassignLocker(int $locker_id)
    {
        $sql = "UPDATE locker SET name = \"UNASSIGNED\" WHERE locker_id = ?";

        $this->execute($sql, [$locker_id]);

        $sql = "SELECT * FROM locker WHERE locker_id = ?";
        $locker = $this->selectOne($sql, [$locker_id]);

        if ($locker['name'] == "UNASSIGNED") {
            return 200;
        } else {
            return 500;
        }
    }
}
