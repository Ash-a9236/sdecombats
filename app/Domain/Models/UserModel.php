<?php

namespace App\Domain\Models;

use App\Helpers\Core\PDOService;

class UserModel extends BaseModel
{
    public function __construct(PDOService $db_service)
    {
        parent::__construct($db_service);
    }

    /**
     * Adds a new user to the database in the users table
     * @param array $data the array containing the data for the new user
     * @return int Returns 201 if successful and 500 if the user wasn't added
     */
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

    /**
     * Checks if a user with this email already exists in the database
     * @param string $email The input email to check
     * @return bool True if a user with the email already exists and false if not
     */
    public function emailExists(string $email): bool
    {
        $sql = "SELECT COUNT(*) FROM users WHERE email = ?)";
        $count = $this->execute($sql, [$email]);
        return $count > 0;
    }

    /**
     * Find a user by his email in the database
     * @param string $email The input email
     * @return array|bool Returns the user data if a user was found with the input email and false if no user was found
     */
    public function findByEmail(string $email): mixed
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $user = $this->selectOne($sql, [$email]);
        return $user;
    }

    /**
     * Finds a user by his ID in the database
     * @param int $user_id The input user ID
     * @return array|bool Returns the user data if a user was found with the input ID and false if no user was found
     */
    public function findById(int $user_id)
    {
        $sql = "SELECT * FROM users WHERE user_id = ?";
        $user = $this->selectOne($sql, [$user_id]);
        return $user;
    }

    /**
     * Updates the password of a user
     * @param int $user_id The input user ID
     * @param string $new_password The new password
     * @return int Returns 201 if the password has successfully been updated and 500 if not
     */
    public function updateUserPassword(int $user_id, string $new_password)
    {
        $sql = "UPDATE users SET password = ? WHERE user_id = ?";
        $this->execute($sql, [
            $new_password,
            $user_id
        ]);

        $sql = "SELECT password FROM users WHERE $user_id = ?";
        $updated_user = $this->selectOne($sql, [$user_id]);

        if ($updated_user == false || empty($updated_user) || $updated_user == null) {
            return 500;
        } else {
            return 201;
        }
    }

    /**
     * Updates the email of a user
     * @param int $user_id The input user ID
     * @param string $new_email The new email
     * @return int Returns 500 if the email has successfully been updated and 500 if not
     */
    public function updateUserEmail(int $user_id, string $new_email)
    {
        $sql = "UPDATE users SET email = ? WHERE user_id = ?";
        $this->execute($sql, [
            $new_email,
            $user_id
        ]);

        $sql = "SELECT password FROM users WHERE $user_id = ?";
        $updated_user = $this->selectOne($sql, [$user_id]);

        if ($updated_user == false || empty($updated_user) || $updated_user == null) {
            return 500;
        } else {
            return 201;
        }
    }

    /**
     * Updates the phone number of a user
     * @param int $user_id The input user ID
     * @param string $new_phone The new phone number
     * @return int Returns 500 if the phone number has successfully been updated and 500 if not
     */
    public function updateUserPhone(int $user_id, string $new_phone)
    {
        $sql = "UPDATE users SET phone = ? WHERE user_id = ?";
        $this->execute($sql, [
            $new_phone,
            $user_id
        ]);

        $sql = "SELECT password FROM users WHERE $user_id = ?";
        $updated_user = $this->selectOne($sql, [$user_id]);

        if ($updated_user == false || empty($updated_user) || $updated_user == null) {
            return 500;
        } else {
            return 201;
        }
    }

    /**
     * Updates the first name of a user
     * @param int $user_id The input user ID
     * @param string $new_fname The new first name
     * @return int Returns 500 if the first name has successfully been updated and 500 if not
     */
    public function updateUserFirstName(int $user_id, string $new_fname)
    {
        $sql = "UPDATE users SET fname = ? WHERE user_id = ?";
        $this->execute($sql, [
            $new_fname,
            $user_id
        ]);

        $sql = "SELECT password FROM users WHERE $user_id = ?";
        $updated_user = $this->selectOne($sql, [$user_id]);

        if ($updated_user == false || empty($updated_user) || $updated_user == null) {
            return 500;
        } else {
            return 201;
        }
    }

    /**
     * Updates the last name of a user
     * @param int $user_id The input user ID
     * @param string $new_lname The new last name
     * @return int Returns 500 if the last name has successfully been updated and 500 if not
     */
    public function updateUserLastName(int $user_id, string $new_lname)
    {
        $sql = "UPDATE users SET lname = ? WHERE user_id = ?";
        $this->execute($sql, [
            $new_lname,
            $user_id
        ]);

        $sql = "SELECT password FROM users WHERE $user_id = ?";
        $updated_user = $this->selectOne($sql, [$user_id]);

        if ($updated_user == false || empty($updated_user) || $updated_user == null) {
            return 500;
        } else {
            return 201;
        }
    }

    public function deleteUser(int $user_id)
    {
        $sql = "UPDATE users SET user_id = 204 WHERE user_id = ?";
        $this->execute($sql, [$user_id]);

        $sql = "SELECT * FROM users WHERE user_id = ?";
        $deleted_user = $this->selectOne($sql, [$user_id]);

        if ($deleted_user == false || empty($deleted_user) || $deleted_user == null) {
            return 200;
        } else {
            return 500;
        }
    }

    /**
     * Verifies the password of a user
     * @param string $email The email of the user
     * @param string $password The input password
     * @return array|bool|int Return an array containing the data of the user if the password was correct and return 500 if not
     */
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
