<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kependudukan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kk');
            $table->integer('nomor_urut');
            $table->string('nama_lengkap');
            $table->string('nik')->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['l', 'p']);
            $table->string('status_hubungan_dalam_keluarga');
            $table->string('agama');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->integer('penghasilan')->nullable();
            $table->integer('pengeluaran')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kependudukan');
    }
};
