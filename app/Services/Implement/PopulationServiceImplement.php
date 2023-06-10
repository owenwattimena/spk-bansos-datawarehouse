<?php
namespace App\Services\Implement;

use App\Models\Kependudukan;
use App\Repositories\PopulationRepository;
use App\Services\PopulationService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class PopulationServiceImplement implements PopulationService
{
    private PopulationRepository $populationRepo;
    public function __construct(PopulationRepository $populationRepo)
    {
        $this->populationRepo = $populationRepo;
    }
    public function getAll(): Collection
    {
        return $this->populationRepo->getAll();
    }
    public function getTotalPopulation(): int
    {
        return $this->populationRepo->getTotalPopulation();
    }
    public function getTotalHouseholdHeads(): int
    {
        return $this->populationRepo->getTotalHouseholdHeads();
    }
    public function create(array $data): bool
    {
        if ($this->populationRepo->create($data))
            return true;
        return false;
    }
    public function deleteAll():bool
    {
        return $this->populationRepo->deleteAll();
    }
}
