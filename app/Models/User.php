<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $table = 'user';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama_user',
        'username',
        'email',
        'password',
        'id_role',
    ];

    protected $hidden = [
        'password',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }
    public function pemohon()
    {
        return $this->hasOne(Pemohon::class, 'id_pemohon', 'id_pemohon');
    }
    public function transaksipembayaran()
    {
        return $this->belongsTo(TransaksiPembayaran::class, 'id_user', 'id_user');
    }
    public function detail_transaksipembayaran()
    {
        return $this->hasMany(DetailsaksiPembayaran::class, 'id_user');
    }

}
