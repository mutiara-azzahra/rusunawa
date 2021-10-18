<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;

class HomeController extends Controller
{
    public function index()
    {
        $ruangan = Ruangan::whereHas('pemohon', function($query){
            $query->where('status_pemohon', 'aktif');

        })
        ->with('pemohon')
        ->get();
        
        return view('home',compact('ruangan'));
    }
    
}
