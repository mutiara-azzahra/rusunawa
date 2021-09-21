<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lantai extends Model
{

    use HasFactory;

    protected $table = 'lantai';
    protected $primaryKey = 'id_lantai';

    protected $fillable = [
        'id_lantai',
        'lantai',
        'id_gedung',
        'created_at',
        'updated_at'
    ];

    public function gedung(){
        return $this->hasOne(Gedung::class, 'id_gedung', 'id_gedung');
    }
    public function ruangan(){
        return $this->hasMany(Ruangan::class, 'id_lantai', 'id_lantai');
    }

}
