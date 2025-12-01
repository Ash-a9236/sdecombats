<?php

namespace App\Domain\Models;

use App\Helpers\Core\PDOService;

class LockerModel extends BaseModel
{
    public function __construct(PDOService $db_service)
    {
        parent::__construct($db_service);
    }

    public function searchAvailableLocker(string $type): int
    {
        $sql = 'SELECT locker_id FROM locker WHERE type = ? AND name = \'UNASSIGNED\' LIMIT 1';

        $locker = $this->selectOne($sql, [
            $type
        ]);

        //! TEMPORARY ERROR CODE
        if ($locker == false) {
            return 500;
        } else {
            return $locker['locker_id'];
        }
    }

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

    public function unassignLocker(int $locker_id)
    {
        $sql = 'UPDATE locker SET name = \'UNASSIGNED\' WHERE locker_id = ?';

        $this->execute($sql, [
            $locker_id
        ]);

        $sql = "SELECT * FROM locker WHERE locker_id = ?";
        $locker = $this->selectOne($sql, [$locker_id]);

        if ($locker['name'] == "UNASSIGNED") {
            return 200;
        } else {
            return 500;
        }
    }
}
