<?php

namespace App\Domain\Models;

use App\Domain\Models\BaseModel;
use App\Helpers\Core\PDOService;

class StaffM extends BaseModel {
    public function __construct (PDOService $pdo_service) {
        parent ::__construct($pdo_service);
    }

    public function verifyCredentials (string $id, string $password): ?array {
        $staff = $this -> findById($id);
        if (!$staff) return [];

        if (password_verify($password, $staff['password_hash'])) {
            return $staff;
        } else {
            return [];
        }
    }

    public function findById (string $id): mixed {
        $sql = "SELECT * FROM staff WHERE id = ?";
        $staff = $this -> selectOne($sql, [
            'id' => $id
        ]);
        return $staff;
    }

    /**
     * will insert the operation performed by a staff member into the LOGGER table in the database
     * @param $user_id the user which performs the action
     * @param $operation a string containing the operation performmed
     * @return void simply executes the log
     */
    public function log (int $user_id, string $operation) {
        $sql = "INSERT INTO logger (staff_id, operation) VALUES (?, ?)";
        $this -> execute($sql, [$user_id, $operation]);
    }

    /**
     * will get the last inserted id within a range (i.e. the last inserted employee)
     * @param $staff_level the range to search within {EMPLOYEE, MANAGER, ADMIN}
     * @return mixed returns the last inserted staff member for the given range
     */
    public function selectLastAddedStaff ($staff_level): mixed {
        if (is_int($staff_level) && $staff_level <= 3 && $staff_level >= 1) {
            $sql = match ($staff_level) {
                1 => "SELECT MAX(staff_id) FROM staff WHERE staff_id < 2000",
                2 => "SELECT MAX(staff_id) FROM staff WHERE staff_id < 3000",
                3 => "SELECT MAX(staff_id) FROM staff WHERE staff_id < 4000",
                4 => "SELECT MAX(staff_id) FROM staff WHERE staff_id > 4000",
                default => "SELECT MAX(staff_id) FROM staff WHERE staff_id < 2000",
            };

            return $this -> selectOne($sql, []);

        } else if (is_string($staff_level)) {
            strtoupper($staff_level);

            $sql = match ($staff_level) {
                "EMPLOYEE" => "SELECT MAX(staff_id) FROM staff WHERE staff_id < 2000",
                "EMPLOYEE" => "SELECT MAX(staff_id) FROM staff WHERE staff_id > 4000",
                "MANAGER" => "SELECT MAX(staff_id) FROM staff WHERE staff_id < 3000",
                "ADMIN" => "SELECT MAX(staff_id) FROM staff WHERE staff_id < 4000",
                default => "SELECT MAX(staff_id) FROM staff WHERE staff_id < 2000",
            };

            return $this -> selectOne($sql, []);
        } else {
            return "ERROR : WRONG STAFF LEVEL";
        }
    }

    /**
     * adds a new staff member to the database through the STAFF table
     * @param $user_id the user performing the action
     * @param $new_staff_name the new staff member's name
     * @param $new_staff_level the new staff member's level {1 = EMPLOYEE, 2 = MANAGER, 3 = ADMIN}
     * @return mixed returns the newly added staff member or the error string if something goes wrong
     */
    public function addStaff ($user_id, $new_staff_name, $new_staff_level): mixed {

        $last_staff = $this -> selectLastAddedStaff($new_staff_level);

        if ($last_staff == false || empty($last_staff) || ($last_staff == null) || !$last_staff) {
            return "ERROR READING LAST INSERTED ID : IMPOSSIBLE TO ADD NEW STAFF AT THE MOMENT";
        } else {
            $new_staff_id = $last_staff[0] + 1;
            $sql = "INSERT INTO staff (staff_id, name, level) VALUES (?, ?, ?)";
            $this -> execute($sql, [$new_staff_id, $new_staff_name, $new_staff_level]);

            $new_staff = $this -> lastInsertStaff();

            if ($new_staff == false || empty($new_staff) || ($new_staff == null) || !$new_staff) {
                return "ERROR READING LAST INSERTED ID : CHECK MANUALLY SINCE NEW STAFF MIGHT NOT HAVE BEEN ADDED";
            } else if ($new_staff[1] != $new_staff_id || $new_staff[2] != $new_staff_name) {
                return "ERROR DURING THE INSERTION : TRY AGAIN";
            } else {
                $operation = "[$user_id] ADDED NEW STAFF [{$new_staff[1]} : {$new_staff[2]}]";
                log($user_id, $operation);
                array_push($new_staff, $operation);
                return $new_staff;
            }
        }
    }

    public function updateStaffName ($user_id, $staff_id, $staff_name): mixed {
        $sql = "UPDATE staff SET name = ? WHERE id = ?";
        $this -> execute($sql, [$staff_name, $staff_id]);

        $sql_verification = "SELECT * FROM staff WHERE id = ?";
        $updated_staff = $this -> selectOne($sql_verification, [$staff_id]);

        if ($updated_staff == false || empty($updated_staff) || $updated_staff == null || !$updated_staff) {
            return "ERROR DURING THE UPDATE : IMPOSSIBLE TO CHECK RECORD WITH ID $staff_id";
        } else {
            $operation = "[$user_id] UPDATED STAFF NAME [{$updated_staff[1]} : {$updated_staff[2]}]";
            log($user_id, $operation);
            array_push($updated_staff, $operation);
            return $updated_staff;
        }
    }

    public function updateStaffPassword ($user_id, $staff_id, $staff_password): mixed {
        $sql = "UPDATE staff SET password = ? WHERE id = ?";
        $this -> execute($sql, [$staff_password, $staff_id]);

        $sql_verification = "SELECT * FROM staff WHERE id = ?";
        $updated_staff = $this -> selectOne($sql_verification, [$staff_id]);

        if ($updated_staff == false || empty($updated_staff) || $updated_staff == null) {
            return "ERROR DURING THE UPDATE : IMPOSSIBLE TO CHECK RECORD WITH ID $staff_id";
        } else {
            $operation = "[$user_id] UPDATED STAFF PASSWORD [{$updated_staff[1]} : {$updated_staff[4]}]";
            log($user_id, $operation);
            array_push($updated_staff, $operation);
            return $updated_staff;
        }
    }

    public function updateStaffLevel ($user_id, $staff_id, $staff_new_level): mixed {
        if ((($user_id % 4 == 0) || $user_id >= $staff_id) && (substr(strval($user_id), 0, 1) >= substr(strval($staff_new_level), 0, 1) || substr(strval($user_id), 0, 1) == 4)) { // if the user making change is an login-protected or of a higher (or same) level of the staff to be modified and that the new staff id is not at a higher level than the staff modifying (except when its an login-protected) then you can proceed :...
            $sql = "UPDATE staff SET level = ? WHERE id = ?"; // first updates the enum level
            $this -> execute($sql, [$staff_new_level, $staff_id]);

            $last_added_staff = $this -> selectLastAddedStaff($staff_new_level);
            $staff_new_id = $last_added_staff[0] + 1;

            $sql = "UPDATE staff SET staff_id = ? WHERE id = ?"; // updates the actual id
            $this -> execute($sql, [$staff_new_id, $staff_id]);

            $sql_verification = "SELECT * FROM staff WHERE id = ?";
            $updated_staff = $this -> selectOne($sql_verification, [$staff_new_id]);

            if ($updated_staff == false || empty($updated_staff) || $updated_staff == null || !$updated_staff) {
                return "ERROR DURING THE UPDATE : IMPOSSIBLE TO CHECK RECORD WITH ID $staff_new_id";
            } else {
                $operation = "[$user_id] UPDATED STAFF $staff_id TO LEVEL $staff_new_level : NEW GIVEN ID [{$updated_staff[1]}]";
                log($user_id, $operation);
                array_push($updated_staff, $operation);
                return $updated_staff;
            }
        } else {
            return "ERROR BEFORE UPDATE : YOU DO NOT POSSESS THE APPROPRIATE LEVEL TO PERFORM SUCH ACTION";
        }
    }

    public function removeStaff ($user_id, $staff_id): string {
        if (($user_id % 4 == 0) || $user_id > $staff_id) {
            $sql = "UPDATE logger SET staff_id = 418 WHERE staff_id = ?"; //1. updates logger to set the staff_id to 418 : thus keeping all the operations the staff made but deleting them from the system
            $this -> execute($sql, [$staff_id]);

            $sql = "SELECT * FROM logger WHERE id = ?"; //2. checks the logger if the old staff_id still remains, if yes => not all the deletion was successful therefore try again
            $row_count = $this -> execute($sql, [$staff_id]); //3. if the row_count is 0 or null, then the operation was successful

            if ($row_count == false || empty($row_count) || $row_count == null || $row_count == 0) {
                $sql = "DELETE FROM staff WHERE id = ?"; //4. deletes the staff from the staff table
                $this -> execute($sql, [$staff_id]);

                $sql_verification = "SELECT * FROM staff WHERE id = ?"; //5. verification that all is deleted from the staff table
                $updated_staff = $this -> selectOne($sql_verification, [$staff_id]);

                if ($updated_staff == false || empty($updated_staff) || $updated_staff == null || !$updated_staff) {
                    $operation = "[$user_id] DELETED STAFF [$staff_id], ASSOCIATED RECORDS NOW CONTAIN ID 418"; //6. 0 exit => staff ok deleted
                    log($user_id, $operation);
                    array_push($updated_staff, $operation);
                    return $updated_staff;
                } else {
                    return "ERROR DURING THE DELETION : $staff_id WAS NOT COMPLETELY DELETED";

                }
            } else {
                return "ERROR DURING THE DELETION : TRY AGAIN"; // the row_count was not null or 0, therefore the staff still exists within the logger table
            }

        } else {
            return "ERROR BEFORE DELETION : YOU DO NOT POSSESS THE APPROPRIATE LEVEL TO DELETE $staff_id";
        }
    }
}


