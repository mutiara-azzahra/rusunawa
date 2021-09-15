<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';
    protected $primaryKey = 'id_galeri';

    protected $fillable = [
        'kategori',
        'foto',
        'id_gedung',
        'update_at',
        'create_at'
    ];

    public function gedung(){
        return $this->belongsTo(Gedung::class, 'id_gedung', 'id_gedung');
    }
    
}
