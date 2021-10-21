<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruangan', function (Blueprint $table) {
            $table->bigIncrements('id_ruangan');
            $table->string('no_ruangan');
            $table->Integer('harga_ruangan');
            $table->string('status_ruangan');
            $table->string('blok');
            $table->Integer('id_lantai');
            $table->Integer('id_gedung');
            $table->Integer('id_pengajuan')->nullable();
            $table->Integer('id_tipe_ruangan')->nullable();
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
        Schema::dropIfExists('ruangan');
    }
}
