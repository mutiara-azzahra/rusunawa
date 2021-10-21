<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    use HasFactory;

    protected $table = 'pemohon';
    protected $primaryKey = 'id_pemohon';

    protected $fillable = [
        'nama_kepala_keluarga', 
        'nik_kepala_keluarga',
        'pekerjaan_kepala_keluarga',
        'no_kartu_keluarga',
        'alamat',
        'jumlah_anggota_keluarga',
        'tanggal_pengajuan',
        'status_pengajuan',
        'keterangan',
        'id_kota',
        'id_kecamatan',
        'id_kelurahan',
        'foto_ktp',
        'foto_akta_nikah',
        'foto_surat_keterangan_penghasilan',
        'foto_anggota_keluarga',
        'id_gedung',
        'id_lantai',
        'id_ruangan',
        'id_user', 
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user','id_user');
    }
    public function transaksipembayaran()
    {
        return $this->hasMany(TransaksiPembayaran::class, 'id_transaksi_pembayaran', 'id_transaksi_pembayaran');
    }
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruangan', 'id_ruangan');
    }
}
