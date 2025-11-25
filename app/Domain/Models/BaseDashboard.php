<?php

namespace App\Domain\Models;
use App\Domain\Models\BaseModel;
use App\Helpers\Core\PDOService;

class DashboardM extends BaseModel {
    public function __construct(PDOService $pdo_service) {
        parent::__construct($pdo_service);
    }

    public function log ($user_id, $operation) {
        $sql = "INSERT INTO logger (staff_id, operation) VALUES (?, ?)"
        $this -> execute ($sql, [$user_id, $operation]);
    }

    public function addStaff ($user_id, $new_staff_name, $new_staff_level) : mixed {

        switch ($new_staff_level) {
            case 1 || "EMPLOYEE" :
                $sql = "SELECT MAX(staff_id) FROM staff WHERE staff_id < 2000";
                break;
            case 2 || "MANAGER" :
                $sql = "SELECT MAX(staff_id) FROM staff WHERE staff_id < 3000";
                break;
            case 3 || "ADMIN" :
                $sql = "SELECT MAX(staff_id) FROM staff WHERE staff_id < 4000";
                break;
            default :
                $sql = "SELECT MAX(staff_id) FROM staff WHERE staff_id < 2000";
                break;
        }

        $last_staff_id = $this -> selectOne ($sql, []);

        $sql = "INSERT INTO staff (name, level) VALUES (?, ?)"
        $this -> execute ($sql, [$new_staff_name, $new_staff_level]);

        $new_staff = $this -> lastInsertStaff ();

        if ($new_staff == false || $new_staff == empty || $new_staff == null) {
            return "ERROR READING LAST INSERTED ID : CHECK MANUALLY IF THE NEW STAFF MEMBER WAS ADDED";
        } else if ($new_staff[2] != $new_staff_name) {
            return "ERROR DURING THE INSERTION : TRY AGAIN";
        } else {
            $operation = "[$user_id] ADDED NEW STAFF [$new_staff[1] : $new_staff[2]]";
            log($user_id, $operation);
            array_push($new_staff, $operation);
            return $new_staff;
        }
    }

    public function updateStaffName ($user_id, $staff_id, $staff_name) : mixed {
        $sql = "UPDATE STAFF SET name = ? WHERE id = ?"
        $this -> execute ($sql, [$staff_name, $staff_id]);

        $sql_verification = "SELECT * FROM staff WHERE id = ?"
        $updated_staff = $this -> selectOne ($sql_verification, [$staff_id]);

        if ($updated_staff == false || $updated_staff == empty || $updated_staff == null) {
            return "ERROR DURING THE UPDATE : IMPOSSIBLE TO CHECK RECORD WITH ID $staff_id";
        } else {
            $operation = "[$user_id] UPDATED STAFF NAME [$updated_staff[1] : $updated_staff[2]]";
            log($user_id, $operation);
            array_push($updated_staff, $operation);
            return $updated_staff;
        }
    }

    public function updateStaffPassword ($user_id, $staff_id, $staff_password) : mixed {
        $sql = "UPDATE STAFF SET password = ? WHERE id = ?"
        $this -> execute ($sql, [$staff_password, $staff_id]);

        $sql_verification = "SELECT * FROM staff WHERE id = ?"
        $updated_staff = $this -> selectOne ($sql_verification, [$staff_id]);

        if ($updated_staff == false || $updated_staff == empty || $updated_staff == null) {
            return "ERROR DURING THE UPDATE : IMPOSSIBLE TO CHECK RECORD WITH ID $staff_id";
        } else {
            $operation = "[$user_id] UPDATED STAFF PASSWORD [$updated_staff[1] : $updated_staff[4]]";
            log($user_id, $operation);
            array_push($updated_staff, $operation);
            return $updated_staff;
        }
    }

    //TODO : find a way to change the id to reflect the change of level within the staff (might have some conflicts to just update the first number : might need to create a new user altogether and delete the old one)
    public function updateStaffLevel ($user_id, $staff_id, $staff_level) : mixed {
        if ((($user_id % 4 == 0) || $user_id >= staff_id) && (substr(strval($user_id), 0, 1) >= substr(strval($staff_level), 0, 1) || substr(strval($user_id), 0, 1) == 4)) { // if the user making change is an admin or of a higher (or same) level of the staff to be modified and that the new staff id is not at a higher level than the staff modifying (except when its an admin) then you can proceed :...
            $sql = "UPDATE STAFF SET level = ? WHERE id = ?"
            $this -> execute ($sql, [$staff_level, $staff_id]);

            $sql_verification = "SELECT * FROM staff WHERE id = ?"
            $updated_staff = $this -> selectOne ($sql_verification, [$staff_id]);

            if ($updated_staff == false || $updated_staff == empty || $updated_staff == null) {
                return "ERROR DURING THE UPDATE : IMPOSSIBLE TO CHECK RECORD WITH ID $staff_id";
            } else {
                $operation = "[$user_id] UPDATED STAFF PASSWORD [$updated_staff[1] : $updated_staff[4]]";
                log($user_id, $operation);
                array_push($updated_staff, $operation);
                return $updated_staff;
            }
        } else {
            return "ERROR BEFORE UPDATE : YOU DO NOT POSSESS THE APPROPRIATE LEVEL TO "
        }
    }

    public function removeStaff ($user_id, $staff_id) : string {
        if (($user_id % 4 == 0) || $user_id >= staff_id) {
            $sql = "UPDATE logger SET staff_id = 418 WHERE staff_id = ?" //1. updates logger to set the staff_id to 418 : thus keeping all the operations the staff made but deleting them from the system
            $this -> execute ($sql, [$staff_id]);
            
            $sql = "SELECT * FROM logger WHERE id = ?" //2. checks the logger if the old staff_id still remains, if yes => not all the deletion was successful therefore try again
            $row_count = $this -> execute ($sql, [$staff_id]); //3. if the row_count is 0 or null, then the operation was successful
            
            if ($row_count == false || $row_count == empty || $row_count == null || $row_count == 0 ) {
                $sql = "DELETE FROM staff WHERE id = ?" //4. deletes the staff from the staff table
                $this -> execute ($sql, [$staff_id]);

                $sql_verification = "SELECT * FROM staff WHERE id = ?" //5. verification that all is deleted from the staff table
                $updated_staff = $this -> selectOne ($sql_verification, [$staff_id]);

                if ($updated_staff == false || $updated_staff == empty || $updated_staff == null) {
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
            return "ERROR BEFORE DELETION : YOU DO NOT POSSESS THE APPROPRIATE LEVEL TO DELETE $staff_id"
        }
    }


//EXAMPLE METHODS -->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    public function fetchShopFromId ($shop_id) : mixed {
        $sql = "SELECT * FROM cafes WHERE id = ?";
        $cafe = $this->selectOne($sql, [$shop_id]);
        return $cafe;
    }
    public function getTotalAverage () : float {
        $sql = "SELECT AVG(average_rating) FROM cafes";
        $average = $this -> countDouble($sql);
        return $average;
    }

    public function getTop5Shops () : mixed {
        $sql = "SELECT * FROM cafes ORDER BY average_rating DESC LIMIT 5";
        $cafes = $this -> selectAll($sql);
        return $cafes;
    }
    // methods
}


