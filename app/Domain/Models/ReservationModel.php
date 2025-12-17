<?php

namespace App\Domain\Models;

class ReservationModel extends BaseModel
{
    public function getAllReservations(): array
    {
        $sql = "SELECT r.reservation_id, r.start, r.end, r.num_of_users,
                       u.fname, u.lname, u.email,
                       a.name as activity_name, p.name as package_name
                FROM reservation r
                JOIN users u ON r.user_id = u.user_id
                LEFT JOIN activity a ON r.activity_id = a.activity_id
                LEFT JOIN package p ON r.package_id = p.package_id
                ORDER BY r.start DESC";
        return $this->selectAll($sql);
    }

    public function getReservationById(int $id): array|false
    {
        $sql = "SELECT * FROM reservation WHERE reservation_id = :id";
        return $this->selectOne($sql, ['id' => $id]);
    }

    public function updateReservation(int $id, array $data): bool
    {
        $sql = "UPDATE reservation
            SET start = :start,
                num_of_users = :num_of_users
            WHERE reservation_id = :id";

        $params = [
            'start' => $data['start'],
            'num_of_users' => $data['num_of_users'],
            'id' => $id
        ];

        return $this->execute($sql, $params) >= 0;
    }

    public function deleteReservation(int $id): bool
    {
        try {
            $this->beginTransaction();

            $sqlReserved = "DELETE FROM reserved WHERE reservation_id = :id";
            $this->execute($sqlReserved, ['id' => $id]);

            $sql = "DELETE FROM reservation WHERE reservation_id = :id";
            $deleted = $this->execute($sql, ['id' => $id]);

            $this->commit();

            return $deleted > 0;
        } catch (\Exception $e) {
            $this->rollback();
            return false;
        }
    }
}
