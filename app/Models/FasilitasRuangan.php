<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasRuangan extends Model
{
    use HasFactory;
    
    protected $table = 'fasilitas_ruangan';
    protected $primaryKey = 'id_fasilitas_ruangan';

    protected $fillable = [
    'no_ruangan', 'id_tipe_ruangan', 'nama_fasilitas_ruangan', 'jumlah', 'status_fasilitas_ruangan', 'id_ruangan', 'update_at', 'create_at'
    ];
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruangan', 'id_ruangan');
    }
    public function tiperuangan()
    {
        return $this->belongsTo(TipeRuangan::class, 'id_tipe_ruangan', 'id_tipe_ruangan');
    }
}
