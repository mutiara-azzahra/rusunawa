<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Kota;

class KelurahanController extends Controller
{    
    public function index()
    {
        $kelurahan = Kelurahan::latest()->paginate(5);
        
        return view('kelurahan.index',compact('kelurahan'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $kota = Kota::all();
        $kecamatan = Kecamatan::all();

        return view('kelurahan.create',compact('kecamatan', 'kota'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'nama_kelurahan' => 'required',
            'id_kecamatan' => 'required',
        ]);

        Kelurahan::create($request->all());
        
        return redirect()->route('kelurahan.index')->with('success','Data baru berhasil ditambahkan');
    }

    public function show( $id)
    {
        return view('kelurahan.show', [
            'kelurahan' => Kelurahan::findOrFail($id)]);
    }
    
    public function edit( $id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kecamatan = Kecamatan::all();
        $kota = Kota::all();

        return view('kelurahan.edit',compact('kelurahan', 'kecamatan', 'kota'));
    }
  
    public function update(Request $request, Kelurahan $kelurahan)
    {
        $request->validate([
            'nama_kelurahan' => 'required',
            'id_kecamatan' => 'required',
        ]);
         
        $kelurahan->update($request->all());
         
        return redirect()->route('kelurahan.index')
                        ->with('success','Data kelurahan berhasil ditambahkan!');
    }
  
    public function destroy( $id)
    {
        $kelurahan = Kelurahan::destroy($id);
  
        return redirect()->route('kelurahan.index')
                        ->with('success','Data kelurahan berhasil dihapus!');
    }
    
}
