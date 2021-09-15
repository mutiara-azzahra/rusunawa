<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoRuangan extends Model
{
    use HasFactory;

    protected $table = 'pemohon';
    protected $primaryKey = 'id_pemohon';

    protected $fillable = [
        'nama_kepala_keluarga', 'nik_kepala_keluarga', 'pekerjaan_kepala_keluarga',
        'no_kartu_keluarga', 'alamat', 'jumlah_anggota_keluarga', 'tanggal_pengajuan',
        'status_pengajuan', 'keterangan', 'foto_ktp', 'foto_kartu_keluarga', 'id_user',
        'id_ruangan', 'id_gedung', 'id_tipe_ruangan', 'created_at', 'updated_at'
    ];
}
