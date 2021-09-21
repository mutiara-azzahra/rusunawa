<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pembayaran', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi_pembayaran');
            $table->Integer('id_gedung');
            $table->Integer('id_ruangan');
            $table->Integer('harga');
            $table->date('awal');
            $table->date('akhir');
            $table->date('tanggal_bayar');
            $table->Integer('total_bayar');
            $table->Integer('id_admin');
            $table->Integer('id_user');
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
        Schema::dropIfExists('transaksi_pembayaran');
    }
}
