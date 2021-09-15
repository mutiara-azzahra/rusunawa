<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = 'dokumen';
    protected $primaryKey = 'id_dokumen';

    protected $fillable =[
        'ktp', 'kartu_keluarga', 'surat_keterangan_1', 'surat_keterangan_2', 'id_pemohon',
        'update_at', 'create_at'
    ];
}
