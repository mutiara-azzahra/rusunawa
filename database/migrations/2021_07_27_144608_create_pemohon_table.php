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
            $table->Integer('id_kota')->nullable();
            $table->Integer('id_kecamatan')->nullable();
            $table->Integer('id_kelurahan')->nullable();
            $table->Integer('jumlah_anggota_keluarga');
            $table->date('tanggal_pengajuan');
            $table->enum('status_pengajuan', ['diverifikasi', 'belum lengkap', 'diproses', 'ditolak']);
            $table->enum('status_permohonan', ['aktif', 'tidak aktif']);
            $table->text('keterangan');
            $table->text('foto_ktp')->nullable();
            $table->text('foto_anggota_keluarga')->nullable();
            $table->text('foto_akta_nikah')->nullable();
            $table->text('foto_surat_keterangan_penghasilan')->nullable();
            $table->Integer('id_user')->nullable();
            $table->Integer('id_ruangan')->nullable();
            $table->Integer('id_lantai')->nullable();
            $table->Integer('id_gedung')->nullable();
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
