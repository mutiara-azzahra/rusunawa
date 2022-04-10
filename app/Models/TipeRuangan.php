<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeRuangan extends Model
{
    use HasFactory;

    protected $table = 'tipe_ruangan';
    protected $primaryKey = 'id_tipe_ruangan';

    protected $fillable = [
        'tipe_ruangan',
        'id_gedung',
        'update_at',
        'create_at'
    ];
    public function ruangan(){
        return $this->belongsTo(Ruangan::class, 'id_ruangan', 'id_ruangan');
    }
    public function fasilitasruangan()
    {
        return $this->hasMany(Ruangan::class, 'id_fasilitas_ruangan', 'id_fasilitas_ruangan');
    }
    public function gedung(){
        return $this->hasOne(Gedung::class, 'id_gedung');
    }
}