<?php

namespace App\Http\Controllers;

use App\Services\DatawarehouseService;
use App\Services\PopulationService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AnalisisController extends Controller
{
    private PopulationService $populationService;
    private DatawarehouseService $datawarehouseService;
    public function __construct(PopulationService $populationService, DatawarehouseService $datawarehouseService)
    {
        $this->populationService = $populationService;
        $this->datawarehouseService = $datawarehouseService;
    }
    public function index()
    {
        $data['totalHouseholdHeads'] = $this->populationService->getTotalHouseholdHeads();
        $data['totalPopulation'] = $this->populationService->getTotalPopulation();
        $data['populations'] = $this->populationService->getAll();
        return view('analisis.index', $data);
    }

    public function analitics()
    {
        $data['totalHouseholdHeads'] = $this->populationService->getTotalHouseholdHeads();
        $data['result'] = $this->datawarehouseService->get()->sortBy(['total_penghasilan', 'jumlah_anggota_keluarga' => 'desc']);

        return view('analisis.result', $data);
    }

    public function report()
    {
        $data['result'] = $this->datawarehouseService->get()->sortBy(['total_penghasilan', 'jumlah_anggota_keluarga'=>'desc']);
        $pdf = Pdf::loadView('reports.index', $data);
        $pdf->setPaper('F4', 'landscape');
        return $pdf->stream('report.pdf');
    }
}
