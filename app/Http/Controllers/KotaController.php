<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kota;

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
        $kota = Kota::all();
        return view('kota.create', compact('kota'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'nama_kota'     => 'required',
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

        return view('kota.edit',compact('kota'));
    }
  
    public function update(Request $request, Kota $kota)
    {
        $request->validate([
            'nama_kota'     => 'required',
        ]);
         
        $kota->update($request->all());
         
        return redirect()->route('kota.index')
                        ->with('success','Data kota berhasil diubah!');
    }
  
    public function destroy(Kota $kota)
    {
        try {
            $kota->delete();

            return redirect()->route('kota.index')
                ->with('success','Data kota berhasil dihapus!');

        } catch (\Throwable $th) {
            return redirect()->route('kota.index')
                ->with('warning', 'Terjadi kesalahan! Data '.$kota->nama_gedung.' tidak dapat dihapus');
        }
    }
    
}
