<?php

namespace App\Http\Controllers;

use App\Models\FasilitasGedung;
use Illuminate\Http\Request;

class FasilitasGedungController extends Controller
{    
    public function index()
    {
        $fasilitas_gedung = FasilitasGedung::latest()->paginate(5);
        
        return view('gedung.show',compact('fasilitas_gedung'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function fasilitas_gedung( Request $request)
    {
        $request -> validate([
            'id_fasilitas'      => 'required',
            'jumlah'            => 'required',
            'id_gedung'         => 'required',
        ]);
        $input  = $request->all();
        FasilitasGedung::create($input);

        return redirect()->route('gedung.show')
            ->with('success','Data fasilitas gedung berhasil ditambahkan!');
    }
    public function destroy( $id)
    {
        $fasilitas_gedung = FasilitasGedung::destroy($id);
  
        return redirect()->route('gedung.show')
            ->with('success','Data fasilitas umum berhasil dihapus!');
    }

    
}
