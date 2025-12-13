<?php

namespace App\Domain\Models;
use App\Domain\Models\BaseModel;
use App\Helpers\Core\PDOService;

class DashboardM extends BaseModel {
    public function __construct(PDOService $pdo_service) {
        parent::__construct($pdo_service);
    }
}


