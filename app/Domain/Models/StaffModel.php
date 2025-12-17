<?php

namespace App\Domain\Models;

class StaffModel extends BaseModel
{
    public function getAllEmployees(): array
    {
        $sql = "SELECT * FROM staff ORDER BY level, name";
        return $this->selectAll($sql);
    }
    public function createEmployee(array $data): bool
    {
        $sql = "INSERT INTO staff (staff_id, name, level, password)
            VALUES (:staff_id, :name, :level, :password)";

        $params = [
            'staff_id' => $data['staff_id'],
            'name'     => $data['name'],
            'level'    => $data['level'],
            'password' => $data['password'] ?? 'Hello123'
        ];

        return $this->execute($sql, $params) > 0;
    }
}
