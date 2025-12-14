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
        $sql = "SELECT DISTINCT img_id, img, FROM images WHERE img_id LIKE '%_LOGO_%'";
        $page_data = $this -> selectAll($sql);
        return $page_data;
    }

}
