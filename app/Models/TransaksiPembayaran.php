<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPembayaran extends Model
{
    protected $table = 'transaksi_pembayaran';
    protected $primaryKey = 'id_transaksi_pembayaran';

    protected $fillable = [
    'id_pemohon',
    'id_ruangan',
    'id_user',
    'harga',
    'tahun',
    'updated_at',
    'created_at'
    ];
    
    public function pemohon(){
        return $this->belongsTo(Pemohon::class, 'id_pemohon', 'id_pemohon');
    }
    public function ruangan(){
        return $this->hasOne(Ruangan::class, 'id_ruangan', 'id_ruangan');
    }
    public function detail_transaksi_pembayaran(){
        return $this->hasMany(DetailTransaksiPembayaran::class, 'id_transaksi_pembayaran');
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
