<?php
namespace App\Repositories\Implement;

use App\Models\Kependudukan;
use App\Repositories\PopulationRepository;
use Illuminate\Database\Eloquent\Collection;

class PopulationRepositoryImplement implements PopulationRepository
{
    private Kependudukan $kependudukan;

    public function __construct(Kependudukan $kependudukan)
    {
        $this->kependudukan = $kependudukan;
    }
    public function getAll(): Collection
    {
        return $this->kependudukan->all();
    }
    public function getHouseholdHeads(string $nomor_kk):Kependudukan|null
    {
        return $this->kependudukan->where('nomor_kk', $nomor_kk)->where('status_hubungan_dalam_keluarga', 'like', '%KEPALA%')->first();
    }
    public function getTotalPopulation(): int
    {
        return $this->kependudukan->get()->count();
    }
    public function getTotalHouseholdHeads(): int
    {
        return $this->kependudukan->get()->groupBy('nomor_kk')->count();
    }
    public function create(array $data): Kependudukan|null
    {
        try {
            return $this->kependudukan->create($data);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];

            if ($errorCode === 1062) { // Kode error 1062 menunjukkan duplicate entry
                $errorMessage = $e->errorInfo[2];
                preg_match("/Duplicate entry '(.+)' for key '(.+)'/", $errorMessage, $matches);

                if (isset($matches[2])) {
                    $duplicateField = explode('_', $matches[2])[1];
                    // Handle the duplicate field
                } else {
                    // Handle the duplicate entry error without field information
                }
                throw new \Exception("Duplikasi data. Silakan periksa kembali data $duplicateField yang Anda masukkan."); // Melempar pengecualian kustom dengan pesan yang sesuai
            } else {
                return null;
                // Tangani pengecualian lain jika ada
            }
        }
    }

    public function deleteAll():bool
    {
        return (bool) $this->kependudukan->query()->delete();
    }
}
