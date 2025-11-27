<?php

namespace App\Domain\Models;

use App\Helpers\Core\PDOService;

class UserModel extends BaseModel
{
    public function __construct(PDOService $db_service)
    {
        parent::__construct($db_service);
    }

    public function createUser(array $data)
    {
        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

        $sql = "INSERT INTO user (f_name, l_name, email, phone, password) VALUES (:f_name, :l_name, :email, :phone, :password)";
        $this->execute($sql, [
            'f_name' => $data['f_name'],
            'l_name' => $data['l_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' =>  $hashedPassword
        ]);
    }

    public function emailExists(string $email): bool {
        $sql = "SELECT COUNT(*) FROM user WHERE email = :email)";
        $count = $this->execute($sql, [
            'email' => $email
        ]);
        return $count > 0;
    }

    public function changePassword(int $user_id, string $new_password) {
        $sql = "UPDATE user SET password = :new_password WHERE user_id = :user_id";
        $this->execute($sql, [
            'new_password' => $new_password,
            'user_id' => $user_id
        ]);
    }
}
