<?php

namespace App\Domain\Models;

use App\Domain\Models\BaseModel;
use App\Helpers\Core\PDOService;
use DateTime;

class ReservationM extends BaseModel {
    public function __construct (PDOService $pdo_service) {
        parent ::__construct($pdo_service);
    }

    public function getReservationsForActivity (string $activity_id, string $date): mixed {
        //assuming the view and the controller already parsed the string and verified its a date
        $current_day = new DateTime(strtotime($date));

        $current_day -> format('Y-m-d');

        switch (strtoupper(strval($current_day -> format('l')))) {
            case 'MONDAY' || 'TUESDAY' || 'WEDNESDAY' || 'THURSDAY' || 'FRIDAY':
                $start = $current_day -> settime(13, 0);
                $end = $current_day -> settime(20, 0);
                break;

            case 'SATURDAY':
                $start = $current_day -> settime(11, 0);
                $end = $current_day -> settime(21, 0);
                break;

            case 'SUNDAY':
                $start = $current_day -> settime(11, 0);
                $end = $current_day -> settime(20, 0);
                break;

            default : //smallest opening hours just in case
                $start = $current_day -> settime(13, 0);
                $end = $current_day -> settime(20, 0);
                break;
        }

        //also assumes the date within the reservations are all formated as : Date.Now.ToString("yyyy-MM-dd HH:mm:ss")
        $sql = "SELECT * FROM reservations WHERE activity_id = ? AND WHERE (START BETWEEN ? AND ?)";
        return $this -> selectAll($sql, [$activity_id, $start, $end]);
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

}


