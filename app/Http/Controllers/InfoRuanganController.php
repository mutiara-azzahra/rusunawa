<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemohon;

class InfoRuanganController extends Controller
{
    public function show( $id)
    {
        return view('info-ruangan.show', [
            'pemohon' => Pemohon::findOrFail($id)]);
    }
}
