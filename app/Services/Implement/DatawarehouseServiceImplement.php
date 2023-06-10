<?php
namespace App\Services\Implement;
use App\Repositories\DatawarehouseRepository;
use App\Repositories\PopulationRepository;
use App\Services\DatawarehouseService;
use Illuminate\Support\Collection;
// use Illuminate\Database\Eloquent\Collection;

class DatawarehouseServiceImplement implements DatawarehouseService
{
    private DatawarehouseRepository $datawarehouseRepo;
    private PopulationRepository $populationRepo;
    public function __construct(DatawarehouseRepository $datawarehouseRepo, PopulationRepository $populationRepo)
    {
        $this->datawarehouseRepo = $datawarehouseRepo;
        $this->populationRepo = $populationRepo;
    }
    public function get():Collection
    {
        $result = $this->datawarehouseRepo->get();
        $result->each(function($data){
            $kepala_keluarga = $this->populationRepo->getHouseholdHeads($data->nomor_kk);
            $data->kepala_keluarga = $kepala_keluarga ? $kepala_keluarga->nama_lengkap : null;
            $data->nik = $kepala_keluarga ? $kepala_keluarga->nik : null;
            $data->tempat_lahir = $kepala_keluarga ? $kepala_keluarga->tempat_lahir : null;
            $data->tanggal_lahir = $kepala_keluarga ? $kepala_keluarga->tanggal_lahir : null;
            $data->jenis_kelamin = $kepala_keluarga ? $kepala_keluarga->jenis_kelamin : null;
            $data->agama = $kepala_keluarga ? $kepala_keluarga->agama : null;
            $data->pendidikan = $kepala_keluarga ? $kepala_keluarga->pendidikan : null;
            $data->pekerjaan = $kepala_keluarga ? $kepala_keluarga->pekerjaan : null;
        });
        return $result;
    }
    public function pieChartData():array
    {
        return $this->datawarehouseRepo->pieChartData();
    }
    public function getTotalPopulation():int
    {
        return $this->datawarehouseRepo->getTotalPopulation();
    }
    public function getTotalHouseholdHeads():int
    {
        return $this->datawarehouseRepo->getTotalHouseholdHeads();
    }
}
