<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    use HasFactory;

    protected $table = 'gedung';
    protected $primaryKey = 'id_gedung';

    protected $fillable = [
        'nama_gedung',
        'id_tipe_ruangan',
        'id_rusun',
        'alamat_gedung',
        'jumlah_ruangan',
        'status_gedung',

    ];

    public function lantai(){
        return $this->belongsTo(Lantai::class, 'id_gedung');
    }

    public function tipe_ruangan(){
        return $this->belongsTo(TipeRuangan::class, 'id_tipe_ruangan');
    }

    public function fasilitas_umum(){
        return $this->hasMany(FasilitasUmum::class, 'id_gedung');
    }

    public function galeri(){
        return $this->hasMany(Galeri::class, 'id_gedung');
    }

    public function ruang(){
        return $this->hasMany(Ruangan::class, 'id_ruangan');
    }

   
}
