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

        $sql = "INSERT INTO user (fname, lname, email, phone, password) VALUES (:f_name, :l_name, :email, :phone, :password)";
        $this->execute($sql, [
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' =>  $hashedPassword
        ]);

        return $this->lastInsertId();
    }

    public function emailExists(string $email): bool
    {
        $sql = "SELECT COUNT(*) FROM user WHERE email = :email)";
        $count = $this->execute($sql, [
            'email' => $email
        ]);
        return $count > 0;
    }

    public function findByEmail(string $email) : mixed {
        $sql = "SELECT * FROM user WHERE email = :email";
        $user = $this->selectOne($sql, [
            'email' => $email
        ]);
        return $user;
    }

    public function changeUserInformation(int $user_id, string $new_password = '', string $new_email = '', string $new_phone = '', string $new_fname = '', string $new_lname = '')
    {
        $sql = "UPDATE user SET user_id = user_id";
        $params = [];

        if (!empty($new_password)) {
            $sql .= ", password = :new_password";
            $params['new_password'] = $new_password;
        }
        if (!empty($new_email)) {
            $sql .= ", email = :new_email";
            $params['new_email'] = $new_email;
        }
        if (!empty($new_phone)) {
            $sql .= ", phone = :new_phone";
            $params['new_phone'] = $new_phone;
        }
        if (!empty($new_fname)) {
            $sql .= ", fname = :new_fname";
            $params['new_fname'] = $new_fname;
        }
        if (!empty($new_lname)) {
            $sql .= ", lname = :new_lname";
            $params['new_lname'] = $new_lname;
        }

        if (empty($params)) {
            return;
        }

        $sql .= " WHERE user_id = :user_id";
        $params['user_id'] = $user_id;

        $this->execute($sql, $params);
    }

    public function deleteUser(int $user_id)
    {
        $sql = "DELETE FROM user WHERE user_id = :user_id";
        $this->execute($sql, [
            'user_id' => $user_id
        ]);
    }

    public function verifyCredentials(string $email, string $password): ?array {
        $user = $this->findByEmail($email);
        if (!$user) {
            return null;
        }

        if (password_verify($password, $user['password_hash'])) {
            return $user;
        } else {
            return null;
        }
    }
}
