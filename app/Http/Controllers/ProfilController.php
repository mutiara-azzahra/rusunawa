<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ProfilController extends Controller
{
    public function showProfil() 
    {
        $user = Auth::user();
        
        return view('profil.show',compact('user'));
    }

    public function editProfil($id_user) 
    {
        $user = User::findOrFail($id_user);

        return view('profil.edit', compact('user'));
    }

}
