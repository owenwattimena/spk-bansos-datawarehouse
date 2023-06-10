<?php

namespace App\Http\Controllers;

use App\Helpers\AlertMessage;
use App\Imports\KependudukanImport;
use App\Services\PopulationService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
class ImportController extends Controller
{
    private PopulationService $populationService;
    public function __construct(PopulationService $populationService)
    {
        $this->populationService = $populationService;
    }
    public function index()
    {

        Alert::flash();
        $data['totalPopulation'] = $this->populationService->getTotalPopulation();
        return view('import.index', $data);
    }

    public function import(Request $request)
    {
        try{
            if ($this->populationService->getTotalHouseholdHeads() > 0) {
                if (!$this->populationService->deleteAll())
                    throw new \Exception("Error pada saat menghapus data.");
            }
            Excel::import(new KependudukanImport, $request->file('file'));
            return redirect()->back()->with(AlertMessage::success('Berhasil mengimport database kependudukan', title: 'Import Berhasil!'));
        }catch(\Exception $e)
        {
            return redirect()->back()->with(AlertMessage::success($e->getMessage(), title: 'Import Gagal!'));
        }
    }
}
