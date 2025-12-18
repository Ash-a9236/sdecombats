<?php

namespace App\Domain\Models;

use App\Domain\Models\BaseModel;
use App\Helpers\Core\PDOService;
use DateInterval;
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
        $sql = "SELECT activity_id, start, COUNT(num_of_users) FROM reservations WHERE activity_id = ? AND WHERE (start BETWEEN ? AND ?) GROUP BY start"; //TODO check if the `start` column doesnt mess with a keyword
        return $this -> selectAll($sql, [$activity_id, $start, $end]);
    }

    public function makeReservationForActivity (int $user_id, string $first_activity_id, string $second_activity_id = '', int $num_of_users, string $package_id = '000-000', string $date) {
        $reservation_day = new DateTime(strtotime($date));
        $reservation_day -> format('Y-m-d-H:i:s');

        $last_inserted_reservation_id = $this -> lastInsertId('reservation');
        (int) $last_reservation_num = substr($last_inserted_reservation_id, 22);
        (int) $new_reservation_id = $last_reservation_num++;

        if ($second_activity_id == '' || $second_activity_id == null || empty($second_activity_id)) {
            $reservation_id = "000-000-$first_activity_id-000-00-" . strval($new_reservation_id);

            $activity_length_sql = "SELECT duration FROM activity WHERE id = ?";
            $activity_length = $this -> selectOne($activity_length_sql, [$first_activity_id]);

            $end_date = new DateTime(strtotime($reservation_day));
            $end_date -> add(new DateInterval('PT' . $activity_length . 'M'));
            $end_date -> format('Y-m-d-H:i:s');

            $room_capacity_sql = "SELECT a.activity_id, a.room_id, r.available_places FROM activity a INNER JOIN room r ON a.room_id = r.room_id WHERE a.activity_id = ?";
            $room_capacity_array = $this -> selectOne($room_capacity_sql, [$first_activity_id]);
            (int) $room_capacity = $room_capacity_array[3];

            $sql = "INSERT INTO reservation VALUES ?, ?, 0, ?, '000-000', ?, ?, ?";
            $this -> execute($sql, [$reservation_id, $user_id, $first_activity_id, $reservation_day, $end_date, $num_of_users]);
        }

        /*
         * 1. if second reservation is empyt = no second reservation, package_id = 000-000 else package = package
         * 2. if second reservation is empyt = date of teh second reservation = null = only make one reservation
         * 3. check num of users <= room capacity
         * 4. transaction id = 0
         * 5. if second reservation
         */

        $sql = "";

    }



}


