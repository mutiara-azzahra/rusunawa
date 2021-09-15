<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KotaController extends Controller
{    
    public function index()
    {
        $kota = Kota::latest()->paginate(5);
        
        return view('kota.index',compact('kota'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('kota.create',compact('kecamatan'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'nama_kota'     => 'required',
            'id_kecamatan'  => 'required',
            'id_kelurahan'  => 'required',
        ]);

        Kota::create($request->all());
        
        return redirect()->route('kota.index')->with('success','Data baru berhasil ditambahkan');
    }

    public function show( $id)
    {
        return view('kota.show', [
            'kota' => Kota::findOrFail($id)]);
    }
    
    public function edit( $id)
    {
        $kota = Kota::findOrFail($id);
        $kecamatan = Kecamatan::all();

        return view('kota.edit',compact('kota', 'kecamatan'));
    }
  
    public function update(Request $request, Kota $kota)
    {
        $request->validate([
            'nama_kota'     => 'required',
            'id_kecamatan'  => 'required',
            'id_kelurahan'  => 'required',
        ]);
         
        $kota->update($request->all());
         
        return redirect()->route('kota.index')
                        ->with('success','Data kota berhasil ditambahkan!');
    }
  
    public function destroy( $id)
    {
        $kota = Kota::destroy($id);
  
        return redirect()->route('kota.index')
                        ->with('success','Data kota berhasil dihapus!');
    }
}
