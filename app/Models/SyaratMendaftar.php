<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyaratMendaftar extends Model
{
    use HasFactory;

    protected $table = 'syarat_mendaftar';
    protected $primaryKey = 'id_syarat_mendaftar';

    protected $fillable =[
        'syarat_mendaftar',
        'update_at',
        'create_at'
    ];
    
}
