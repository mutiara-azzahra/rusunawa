<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiPembayaran extends Model
{
    protected $table = 'detail_transaksi_pembayaran';
    protected $primaryKey = 'id_detail_transaksi_pembayaran';

    protected $fillable = [
    'bulan',
    'harga',
    'id_transaksi_pembayaran',
    'id_pemohon',
    'updated_at',
    'created_at'
    ];

    public function transaksipembayaran(){
        return $this->hasMany(TransaksiPembayaran::class, 'id_transaksi_pembayaran', 'id_transaksi_pembayaran');
    }
    public function user(){
        return $this->hasOne(User::class, 'id_detail_transaksi_pembayaran');
    }
}
