<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemohonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemohon', function (Blueprint $table) {
            $table->bigIncrements('id_pemohon');
            $table->text('nama_kepala_keluarga');
            $table->string('nik_kepala_keluarga');
            $table->string('pekerjaan_kepala_keluarga');
            $table->string('no_kartu_keluarga');
            $table->string('alamat');
            $table->Integer('jumlah_anggota_keluarga');
            $table->date('tanggal_pengajuan');
            $table->enum('status_pengajuan', ['diverifikasi', 'sedang verifikasi', 'ditolak']);
            $table->text('keterangan');
            $table->string('foto_ktp')->nullable();
            $table->string('foto_kartu_keluarga')->nullable();
            $table->Integer('id_user')->nullable();
            $table->Integer('id_kelurahan')->nullable();
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
        Schema::dropIfExists('pemohon');
    }
}
