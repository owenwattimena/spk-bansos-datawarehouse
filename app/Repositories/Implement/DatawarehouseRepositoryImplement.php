<?php
namespace App\Repositories\Implement;

use App\Models\Kependudukan;
use App\Repositories\DatawarehouseRepository;
// use Illuminate\Database\Eloquent\Collection;
use App\Repositories\PopulationRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DatawarehouseRepositoryImplement implements DatawarehouseRepository
{
    private Kependudukan $kependudukan;
    public function __construct(Kependudukan $kependudukan)
    {
        $this->kependudukan = $kependudukan;
    }
    public function get(): Collection
    {
        // return $this->kependudukan->get()->groupBy(['kk', 'pemasukan', 'pengeluaran']);
        $result =  DB::table('kependudukan')
            ->select(
                'nomor_kk',
                DB::raw('COUNT(id) as jumlah_anggota_keluarga'),
                DB::raw('SUM(penghasilan) as total_penghasilan'),
                DB::raw('SUM(pengeluaran) as total_pengeluaran')
            )
            ->groupBy('nomor_kk')
            ->get()
            ->filter(function($item){
                return ($item->jumlah_anggota_keluarga <= 3 && $item->total_penghasilan <= 1000000)
                || ($item->jumlah_anggota_keluarga >= 4 && $item->total_penghasilan <= 2000000);
            });


        return $result;
        // return DB::table('kependudukan AS k1')
        // ->leftJoin('kependudukan AS k2', function ($join) {
        //     $join->on('k1.nomor_kk', '=', 'k2.nomor_kk')
        //         ->where('k1.id', '<>', 'k2.id')
        //         ->where('k1.status_hubungan_dalam_keluarga', '=', 'KEPALA KELUARGA');
        // })
        // ->select('k1.nomor_kk', 'k1.nama_lengkap AS kepala_keluarga', DB::raw('COUNT(k1.id) AS jumlah_anggota_keluarga'), DB::raw('SUM(k1.penghasilan) AS total_penghasilan'), DB::raw('SUM(k1.pengeluaran) AS total_pengeluaran'))
        // ->groupBy('k1.nomor_kk', 'k1.nama_lengkap')
        // ->get();
    }
    public function pieChartData(): array
    {
        return [];
    }
    public function getTotalPopulation(): int
    {
        return 0;
    }
    public function getTotalHouseholdHeads(): int
    {
        return 0;
    }
}
