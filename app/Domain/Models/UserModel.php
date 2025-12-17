<?php

namespace App\Domain\Models;

class UserModel extends BaseModel
{
    public function getAllUsers(): array
    {
        $sql = "SELECT u.*, m.end as membership_end
                FROM users u
                LEFT JOIN membership m ON u.membership_id = m.membership_id
                ORDER BY u.lname ASC";
        return $this->selectAll($sql);
    }
}
