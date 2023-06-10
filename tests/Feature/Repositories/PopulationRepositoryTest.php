<?php

namespace Tests\Feature\Repositories;

use App\Models\Kependudukan;
use App\Repositories\PopulationRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PopulationRepositoryTest extends TestCase
{
    private PopulationRepository $populationRepo;

    protected function setUp():void
    {
        parent::setUp();

        $this->populationRepo = \App::make(PopulationRepository::class);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_getAll()
    {
        self::assertEquals(0, $this->populationRepo->getAll()->count(), "Data tidak sama");
    }
    public function test_getTotalPopulation()
    {
        self::assertEquals(0, $this->populationRepo->getTotalPopulation(), "Data tidak sama");
    }
    public function test_getTotalHouseholdHeads()
    {
        self::assertEquals(0, $this->populationRepo->getTotalHouseholdHeads(), "Data tidak sama");
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
        $kependudukan = $this->populationRepo->create($data);
        $this->assertInstanceOf(Kependudukan::class, $kependudukan, "Bukan merupakan object dari Kependudukan");
        $this->assertEquals("8101021609130001", $kependudukan->nomor_kk, "Nomor KK tidak sama");
        $this->assertEquals("8101123007600001", $kependudukan->nik, "NIK tidak sama");
        // self::assertNo
    }

    public function test_deleteAll()
    {
        $result = $this->populationRepo->deleteAll();
        $this->assertTrue($result, "Hasil False");
    }
}
