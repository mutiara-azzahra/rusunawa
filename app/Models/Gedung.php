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
        'alamat_gedung',
        'jumlah_ruangan',
        'status_gedung',
        'update_at',
        'create_at'
    ];

    public function lantai(){
        return $this->hasMany(Lantai::class, 'id_gedung');
    }

    public function tipe_ruangan(){
        return $this->hasMany(TipeRuangan::class, 'id_gedung');
    }

    public function fasilitas_umum(){
        return $this->hasMany(FasilitasUmum::class, 'id_gedung');
    }

    public function galeri(){
        return $this->hasMany(Galeri::class, 'id_gedung');
    }

   
}
