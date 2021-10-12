<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananInformasi extends Model
{
    use HasFactory;

    protected $table = 'info_rusun';
    protected $primaryKey = 'id_info_rusun';

    protected $fillable = [
        'latar_belakang',
        'tipologi_bangunan',
        'sumber_dana',
        'persyaratan_huni',
        'tata_tertib',
        'larangan',
        'created_at', 
        'updated_at'
    ];
}
