<?php
namespace App\Repositories;
use Illuminate\Support\Collection;

interface DatawarehouseRepository
{
    public function get():Collection;
    public function pieChartData():array;
    public function getTotalPopulation():int;
    public function getTotalHouseholdHeads():int;
}
