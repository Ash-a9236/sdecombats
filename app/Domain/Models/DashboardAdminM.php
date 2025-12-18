<?php

namespace App\Domain\Models;
use App\Domain\Models\BaseModel;
use App\Helpers\Core\PDOService;

class DashboardM extends BaseModel {
    public function __construct(PDOService $pdo_service) {
        parent::__construct($pdo_service);
    }

//    public function updateHomeImages () : mixed {
//        $sql = "SELECT DISTINCT img_id, img, FROM images WHERE img_id LIKE 'HOMEP_CRSL_%'";
//        $page_data = $this -> selectAll($sql);
//        return $page_data;
//    }

}


