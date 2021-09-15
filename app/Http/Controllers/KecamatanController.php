<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;

class KecamatanController extends Controller
{    
    public function index()
    {
        $kecamatan = Kecamatan::latest()->paginate(5);
        
        return view('kecamatan.index',compact('kecamatan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('kecamatan.create');
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
        //  dd($kecamatan, $request->all());
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
}