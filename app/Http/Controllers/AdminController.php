<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemohon;


class AdminController extends Controller
{
    public function AdminBeranda()
    {
        $user = auth()->user();
        $pemohon = Pemohon::where('id_user', $user->id_user)->first();

        return view('index',compact('user','pemohon'));
    }
    public function pemohon()
    {
        $user = Auth::user();
        $pemohon = Pemohon::where('id_user', $user->id_user)->first();

        return view('index',compact('pemohon'));
    }
    
}
