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
        $lastInsertedId = $this->lastInsertUser();
        if ($lastInsertedId == 203) {
            $sql = "INSERT INTO users (user_id, language_id, fname, lname, email, phone, password) VALUES (205, ?, ?, ?, ?, ?, ?)";
        } else {
            $sql = "INSERT INTO users (language_id, fname, lname, email, phone, password) VALUES (?, ?, ?, ?, ?, ?)";
        }

        $this->execute($sql, [
            $data['language_id'],
            $data['fname'],
            $data['lname'],
            $data['email'],
            $data['phone'],
            $data['password']
        ]);

        $sql = "SELECT email, password FROM users WHERE user_id = LAST_INSERT_ID()";
        $user = $this->selectOne($sql);

        if ($data['password'] == $user['password'] && $data['email'] == $user['email']) {
            return 201;
        } else {
            return 500;
        }
    }

    public function emailExists(string $email): bool
    {
        $sql = "SELECT COUNT(*) FROM users WHERE email = ?)";
        $count = $this->execute($sql, [$email]);
        return $count > 0;
    }

    public function findByEmail(string $email): mixed
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $user = $this->selectOne($sql, [$email]);
        return $user;
    }

    public function findById(int $user_id)
    {
        $sql = "SELECT * FROM users WHERE user_id = ?";
        $user = $this->selectOne($sql, [$user_id]);
        return $user;
    }

    public function changeUserInformation(array $data)
    {
        $user_id = $data['user_id'];
        $new_password = $data['new_password'] ?? '';
        $new_email = $data['new_email'] ?? '';
        $new_phone = $data['new_phone'] ?? '';
        $new_fname = $data['new_fname'] ?? '';
        $new_lname = $data['new_lname'] ?? '';

        $sql = "UPDATE users SET user_id = user_id";
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
        $sql = "DELETE FROM users WHERE user_id = :user_id";
        $this->execute($sql, [
            'user_id' => $user_id
        ]);
    }

    public function verifyCredentials(string $email, string $password): mixed
    {
        $user = $this->findByEmail($email);
        if (!$user) {
            return 500;
        }

        if (password_verify($password, $user['password_hash'])) {
            return $user;
        } else {
            return 500;
        }
    }
}
