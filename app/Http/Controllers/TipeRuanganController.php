<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeRuangan;
use App\Models\Gedung;

class TipeRuanganController extends Controller
{    
    public function index()
    {
        $tipe_ruangan = TipeRuangan::latest()->paginate(5);
        
        return view('tiperuangan.index',compact('tipe_ruangan'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('tiperuangan.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'tipe_ruangan' => 'required',
        ]);

        TipeRuangan::create($request->all());
        
        return redirect()->route('tiperuangan.index')->with('success','Data baru berhasil ditambahkan');
    }

    public function show( $id)
    {
        return view('tiperuangan.show', [
            'tipe_ruangan' => TipeRuangan::findOrFail($id)]);
    }
    
    public function edit( $id)
    {
        $tipe_ruangan = TipeRuangan::all();

        return view('tiperuangan.edit',compact('ruangan, tipe_ruangan'));
    }
  
    public function update(Request $request, $id)
    {
        TipeRuangan::findOrFail($id)->update([
            'tipe_ruangan' => $request->tipe_ruangan
            ]);
         
        return redirect()->route('tiperuangan.index')
                        ->with('success','Data tipe ruangan berhasil ditambahkan!');
    }
  
    public function destroy( $id)
    {
        $tipe_ruangan = TipeRuangan::destroy($id);
  
        return redirect()->route('tiperuangan.index')
                        ->with('success','Data tipe ruangan berhasil dihapus!');
    }
}
