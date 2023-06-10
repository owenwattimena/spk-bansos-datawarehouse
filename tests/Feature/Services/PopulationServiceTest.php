<?php

namespace Tests\Feature\Services;

use App\Services\PopulationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PopulationServiceTest extends TestCase
{
    private PopulationService $populationService;
    protected function setUp():void
    {
        parent::setUp();
        $this->populationService = \App::make(PopulationService::class);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_getAll()
    {
        $response = $this->populationService->getAll();

        $this->assertNotEmpty($response, 'Tidak ada data.');
    }
    public function test_getTotalPopulation()
    {
        $response = $this->populationService->getTotalPopulation();

        $this->assertEquals(443, $response, 'Hasil tidak sesuai.');
    }
    public function test_getTotalHouseholdHeads()
    {
        $response = $this->populationService->getTotalHouseholdHeads();

        $this->assertEquals(150, $response, 'Hasil tidak sesuai.');
    }
    public function test_create()
    {
        $data = [
            "nomor_kk" => "8101021609130001",
            "nomor_urut" => 1,
            "nama_lengkap" => "FRANS TAHAPARY",
            "nik" => "8101123007600001",
            "tempat_lahir" => "HARIA",
            "tanggal_lahir" => "1960-07-30",
            "jenis_kelamin" => 'Laki-Laki',
            "status_hubungan_dalam_keluarga" => "KEPALA KELUARGA",
            "agama" => "KRISTEN",
            "pendidikan" => "SLTA/SEDERAJAT",
            "pekerjaan" => "PETANI/PEKEBUN",
            "penghasilan" => 500000,
            "pengeluaran" => 45000,
        ];
        $response = $this->populationService->create($data);

        $this->assertTrue($response, 'Hasil false.');
    }
    public function test_deleteAll()
    {
        $result = $this->populationService->deleteAll();
        $this->assertTrue($result, "Hasil False");
    }
}
