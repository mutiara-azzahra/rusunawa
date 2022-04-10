<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $table = 'kelurahan';
    protected $primaryKey = 'id_kelurahan';

    protected $fillable =[
        'nama_kelurahan',
        'id_kecamatan',
        'id_kota',
        'update_at',
        'create_at'
    ];
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id_kecamatan');
    }
    public function kota(){
        return $this->hasOne(Kota::class, 'id_kota', 'id_kota');
    }

}
