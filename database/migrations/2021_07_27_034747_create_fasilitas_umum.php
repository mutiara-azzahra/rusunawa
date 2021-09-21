<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasUmum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas_umum', function (Blueprint $table) {
            $table->bigIncrements('id_fasilitas_umum');
            $table->string('nama_fasilitas_umum');
            $table->Integer('jumlah');
            $table->string('status_fasilitas_umum');
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
        Schema::dropIfExists('fasilitas_umum');
    }
}
