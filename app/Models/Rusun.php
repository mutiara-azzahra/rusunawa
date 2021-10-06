<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rusun extends Model
{
    use HasFactory;

    protected $table = 'rusun';
    protected $primaryKey = 'id_rusun';

    protected $fillable = [
        'nama_rusun',
        'alamat',
        'foto',
        'update_at',
        'create_at'
    ];

}
