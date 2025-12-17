<?php
namespace App\Domain\Models;

class ActivityModel extends BaseModel
{
    public function getAllActivities(): array
    {
        return $this->selectAll("SELECT * FROM activity ORDER BY name");
    }

    public function getAllPackages(): array
    {
        return $this->selectAll("SELECT * FROM package ORDER BY name");
    }
}
