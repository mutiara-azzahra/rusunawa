<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function home(){
        return view('home');
    }
    public function alur(){
        return view('alur');
    }
    public function pendaftaran(){
        return view('pendaftaran');
    }
    public function faq(){
        return view('faq');
    }
    public function masuk(){
        return view('login');
    }
    //
}
