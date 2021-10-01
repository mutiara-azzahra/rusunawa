<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\RusunawaBanjarmasinEmail;
use Illuminate\Support\Facades\Mail;

class RusunawaBanjarmasinController extends Controller
{
    public function index(Request $request){

        $user = User::where('email', $request->email)->first();
            
        if($user != null){

            $user->password = Hash::make('12345');
            $user->update();

            Mail::to($request->email)->send(new RusunawaBanjarmasinEmail($user));

            return redirect()->route('login')
                            ->with('success','Silahkan cek Email anda untuk cek password baru anda');
        }
        else{
            return redirect()->route('forgot-password')
                            ->with('warning','Email tidak ditemukan');
        }


        

    }
}
