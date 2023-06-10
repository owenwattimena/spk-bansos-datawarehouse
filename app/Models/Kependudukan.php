<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Kependudukan extends Model
{
    use HasFactory;

    protected $table = 'kependudukan';

    protected $fillable = [
        "nomor_kk",
        "nomor_urut",
        "nama_lengkap",
        "nik",
        "tempat_lahir",
        "tanggal_lahir",
        "jenis_kelamin",
        "status_hubungan_dalam_keluarga",
        "agama",
        "pendidikan",
        "pekerjaan",
        "penghasilan",
        "pengeluaran",
    ];

    protected function jenisKelamin(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => strtolower(substr($value, 0, 1)),
            get: fn (string $value) => $value == 'l' ? 'Laki-laki' : 'Perempuan'
        );
    }
}
