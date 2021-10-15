<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blok extends Model
{
    use HasFactory;

    protected $table = 'blok';
    protected $primaryKey = 'id_blok';

    protected $fillable =[
        'blok',
        'update_at',
        'create_at'
    ];
    public function gedung(){
        return $this->hasMany(Gedung::class, 'id_blok');
    }
}
