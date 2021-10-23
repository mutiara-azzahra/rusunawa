<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Kota;

class KecamatanController extends Controller
{    
    public function index()
    {
        $kecamatan = Kecamatan::latest()->paginate(5);
        
        return view('kecamatan.index',compact('kecamatan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $kota = Kota::all();

        return view('kecamatan.create', compact('kota'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'nama_kecamatan' => 'required',
        ]);

        Kecamatan::create($request->all());
        
        return redirect()->route('kecamatan.index')->with('success','Data baru berhasil ditambahkan');
    }

    public function show( $id)
    {
        return view('kecamatan.show', [
            'kecamatan' => Kecamatan::findOrFail($id)]);
    }
    
    public function edit( $id)
    {
        $kecamatan = Kecamatan::findOrFail($id);

        return view('kecamatan.edit',compact('kecamatan'));
    }
  
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $request->validate([
            'nama_kecamatan' => 'required',
        ]);
        $kecamatan->update($request->all());
         
        return redirect()->route('kecamatan.index')
                        ->with('success','Data kecamatan berhasil ditambahkan!');
    }
  
    public function destroy( $id)
    {
        $kecamatan = Kecamatan::destroy($id);
  
        return redirect()->route('kecamatan.index')
                        ->with('success','Data kecamatan berhasil dihapus!');
    }
    public function api($id)
    {
        $data = Kecamatan::where('id_kota', $id)->get();

        return json_encode($data);
    }
    
}