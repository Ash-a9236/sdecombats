<?php

namespace App\Domain\Models;

use App\Helpers\Core\PDOService;

class PagesM extends BaseModel {
    public function __construct (PDOService $db_service) {
        parent ::__construct($db_service);
    }

    public function getHomeData (): mixed {
        $sql = "SELECT * FROM image WHERE image_id LIKE 'HOMEP_CRSL_%'";
        $page_data = $this -> selectAll($sql);

        return $page_data;
    }

    public function getAllActivitiesData () : mixed {
        $sql = "SELECT DISTINCT img_id, img, FROM images ORDER BY img_id";
        $page_data = $this -> selectAll($sql);

//        $sql2 = "
//            SELECT
//                i.*,
//                l.abbreviation,
//                a.name AS activity_name,
//                a.room_id,
//                a.duration,
//                p.name AS package_name,
//                p.category,
//                pr.ppl_num,
//                pr.price,
//                group_concat(DISTINCT u.image_id) AS image_ids,
//                COUNT(DISTINCT u.image_id) AS image_count
//            FROM information i
//            INNER JOIN language l ON i.language_id = l.language_id
//            LEFT JOIN activity a ON i.reference_id = a.activity_id AND i.reference_type = 'ACTIVITY'
//            LEFT JOIN package p ON i.reference_id = p.package_id AND i.reference_type = 'PACKAGE'
//            LEFT JOIN price pr ON i.reference_id = pr.reference_id
//            LEFT JOIN uses u ON i.reference_id = u.reference_id
//            WHERE i.language_id = :lang_id
//            GROUP BY i.reference_id, i.reference_type, i.alt_name, i.small_description,
//                     i.full_description, a.name, a.room_id, a.duration, p.name,
//                     p.category, l.abbreviation, pr.ppl_num, pr.price
//            ORDER BY i.reference_type, i.reference_id
//            ";
//        $activities_data = $this -> selectAll($sql2);
        return $page_data;
    }

    public function getAllActivitiesLogos () : mixed {
        $sql = "SELECT DISTINCT img_id, img, FROM images WHERE img_id LIKE '%_LOGO_%'";
        $page_data = $this -> selectAll($sql);
        return $page_data;
    }

    public function getSpecificActivitiesData (int $activity_id) : mixed {
        $sql = "SELECT DISTINCT img_id, img, FROM images WHERE img_id LIKE '?%'";
        $page_data = $this -> selectAll($sql, [$activity_id]);
        return $page_data;
    }

    public function getSmallGroupData () : mixed {
        $sql = "SELECT DISTINCT img_id, img, FROM images WHERE img_id LIKE 'PKGSG%'";
        $page_data = $this -> selectAll($sql);
        return $page_data;
    }

    public function getDateNightData () : mixed {
        $sql = "SELECT DISTINCT img_id, img, FROM images WHERE img_id LIKE 'PKGSG%'";
        $page_data = $this -> selectAll($sql);
        return $page_data;
    }

    public function getAllBirthdaysData () : mixed {
        $sql = "SELECT DISTINCT img_id, img, FROM images WHERE img_id LIKE '%TB%'";
        $page_data = $this -> selectAll($sql);
        return $page_data;
    }

    public function getTeenBirthdayData () : mixed {
        $sql = "SELECT DISTINCT img_id, img, FROM images WHERE img_id LIKE 'PKGTB%'";
        $page_data = $this -> selectAll($sql);
        return $page_data;
    }

    public function getKidsBirthdayData () : mixed {
        $sql = "SELECT DISTINCT img_id, img, FROM images WHERE img_id LIKE 'PKGKB%'";
        $page_data = $this -> selectAll($sql);
        return $page_data;
    }

    public function getCorporateEventsData () : mixed {
        $sql = "SELECT DISTINCT img_id, img, FROM images WHERE img_id LIKE 'PKGCE%'";
        $page_data = $this -> selectAll($sql);
        return $page_data;
    }

    public function getOutsideEventsData () : mixed {
        $sql = "SELECT DISTINCT img_id, img, FROM images WHERE img_id LIKE 'PKGOE%'";
        $page_data = $this -> selectAll($sql);
        return $page_data;
    }

    public function getBigGroupData () : mixed {
        $sql = "SELECT DISTINCT img_id, img, FROM images WHERE img_id LIKE 'PKGBG%'";
        $page_data = $this -> selectAll($sql);
        return $page_data;
    }

    public function getGiftCartData () : mixed {
        $sql = "SELECT DISTINCT img_id, img, FROM images WHERE img_id LIKE 'GIFTCD%'";
        $page_data = $this -> selectAll($sql);
        return $page_data;
    }
}
