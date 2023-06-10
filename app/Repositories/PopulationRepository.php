<?php
namespace App\Repositories;
use App\Models\Kependudukan;
use Illuminate\Database\Eloquent\Collection;

interface PopulationRepository
{
    public function getAll():Collection;
    public function getHouseholdHeads(string $nomor_kk):Kependudukan|null;
    public function getTotalPopulation():int;
    public function getTotalHouseholdHeads():int;
    public function create(array $data): Kependudukan|null;
    public function deleteAll():bool;
}
