<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasGedung extends Model
{
    use HasFactory;

    protected $table = 'fasilitas_gedung';
    protected $primaryKey = 'id_fasilitas_gedung';

    protected $fillable = [
        'id_fasilitas',
        'jumlah',
        'id_gedung',
        'updated_at', 
        'created_at'
    ];

    public function fasilitas(){
        return $this->belongsTo(Fasilitas::class, 'id_fasilitas');
    }
    public function gedung(){
        return $this->hasMany(Gedung::class, 'id_gedung');
    }
}
