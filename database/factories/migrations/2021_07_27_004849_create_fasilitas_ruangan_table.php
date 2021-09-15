<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasRuanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas_ruangan', function (Blueprint $table) {
            $table->bigIncrements('id_fasilitas_ruangan');
            $table->string('no_ruangan');
            $table->Integer('id_tipe_ruangan');
            $table->string('nama_fasilitas_ruangan');
            $table->Integer('jumlah');
            $table->string('status_fasilitas_ruangan');
            $table->Integer('id_ruangan')->nullable();
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
        Schema::dropIfExists('fasilitas_ruangan');
    }
}
