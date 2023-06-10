<?php
namespace App\Services;
use Illuminate\Support\Collection;
// use Illuminate\Database\Eloquent\Collection;

interface DatawarehouseService
{
    public function get():Collection;
    public function pieChartData():array;
    public function getTotalPopulation():int;
    public function getTotalHouseholdHeads():int;
}
