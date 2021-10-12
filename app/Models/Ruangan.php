<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $table = 'ruangan';
    protected $primaryKey = 'id_ruangan';

    protected $fillable = [
        'no_ruangan',
        'id_tipe_ruangan',
        'harga_ruangan',
        'status_ruangan',
        'id_lantai',
        'update_at',
        'create_at'
    ];

    public function transaksipembayaran()
    {
        return $this->hasMany(TransaksiPembayaran::class, 'id_ruangan');
    }
    public function lantai()
    {
        return $this->belongsTo(Lantai::class, 'id_ruangan');
    }
    public function pemohon()
    {
        return $this->hasMany(Pemohon::class, 'id_pemohon');
    }
    
}
