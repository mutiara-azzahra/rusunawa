<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    protected $table = 'kota';
    protected $primaryKey = 'id_kota';

    protected $fillable =[
        'nama_kota',
        'update_at',
        'create_at'
    ];
    public function kecamatan(){
        return $this->hasMany(Kecamatan::class, 'id_kecamatan', 'id_kecamatan');
    }
}
