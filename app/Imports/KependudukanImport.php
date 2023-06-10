<?php

namespace App\Imports;

use App\Models\Kependudukan;
use App\Services\PopulationService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class KependudukanImport implements ToCollection
{

    private PopulationService $populationService;

    public function __construct()
    {
        $this->populationService = app(PopulationService::class);
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(\Illuminate\Support\Collection $collection)
    {
        $nomor_kk = null;
        $dataStart = 9;
        for ($i = 0; $i < $collection->count(); $i++) {
            if ($i >= $dataStart)
            {
                $data = $collection[$i];

                if (!is_null($data[2])) //nomor urut
                {
                    // // debug
                    // if(trim(preg_replace('/\s+/u', ' ', $data[4])) == '8101126009240002')
                    // {
                    //     dump($data);
                    // }
                    // // enddebug

                    if (is_numeric($data[2]) && $data[2] == 1) {
                        $nomor_kk = trim(preg_replace('/\s+/u', ' ', $data[1]));
                    }
                    $tanggal_lahir = $data[6];
                    if (strlen($tanggal_lahir) >= 4) {
                        $tanggal_lahir = date('Y-m-d', mktime(0, 0, 0, 1, $tanggal_lahir - 1, 1900));
                    }
                    $population = [
                        "nomor_kk" => $nomor_kk,
                        "nomor_urut" => $data[2],
                        "nama_lengkap" => $data[3],
                        "nik" => trim(preg_replace('/\s+/u', ' ', $data[4])),
                        "tempat_lahir" => $data[5],
                        "tanggal_lahir" => $tanggal_lahir,
                        "jenis_kelamin" => $data[7],
                        "status_hubungan_dalam_keluarga" => $data[8],
                        "agama" => $data[9],
                        "pendidikan" => $data[10],
                        "pekerjaan" => $data[11],
                        "penghasilan" => $data[12],
                        "pengeluaran" => $data[13],
                    ];
                    if (!is_null($data[7])) {

                        // dump($population);
                        $this->populationService->create($population);
                    }
                }
            }
        }

        // die;
    }
}
