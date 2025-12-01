<?php

namespace App\Domain\Models;

use App\Helpers\Core\PDOService;

class MembershipModel extends BaseModel
{
    public function __construct(PDOService $db_service)
    {
        parent::__construct($db_service);
    }

    public function createMembership(array $data, int $user_id) {
        $sql = "INSERT INTO membership (bow_rental, end) VALUES (:bow_rental, :end)";

        $this->execute($sql, [
            'bow_rental' => $data['bow_rental'],
            'end' => "DATE_ADD(CURRENT_DATE(), INTERVAL {$data['duration']} MONTH)"
        ]);

        $membership_id = $this->lastInsertMembershipId();

        $sql = "UPDATE users SET membership_id = :membership_id WHERE user_id = :user_id";

        $this->execute($sql, [
            'user_id' => $user_id,
            'membership_id' => $membership_id
        ]);
    }
}
