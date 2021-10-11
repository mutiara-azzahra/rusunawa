<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoRusunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_rusun', function (Blueprint $table) {
            $table->bigIncrements('id_info_rusun');
            $table->text('latar_belakang');
            $table->text('tipologi_bangunan');
            $table->text('sumber_dana');
            $table->text('persyaratan_huni');
            $table->text('tata_tertib');
            $table->text('larangan');
            $table->text('id_rusun');
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
        Schema::dropIfExists('info_rusun');
    }
}
