<?php

namespace App\Services;
use App\Models\Kependudukan;
use Illuminate\Database\Eloquent\Collection;

interface PopulationService{
    public function getAll():Collection;
    public function getTotalPopulation():int;
    public function getTotalHouseholdHeads():int;
    public function create(array $data): bool;
    public function deleteAll():bool;
}
