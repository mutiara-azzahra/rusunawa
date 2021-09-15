<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\Lantai;
use App\Models\Gedung;

class RuanganController extends Controller
{    
    public function index()
    {
        $ruangan = Ruangan::latest()->paginate(5);
        
        return view('ruangan.index',compact('ruangan'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $gedung = Gedung::all();
        $lantai = Lantai::all();

        return view('ruangan.create', compact('gedung', 'lantai'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'no_ruangan' => 'required',
            'id_lantai' => 'required',
            'harga_ruangan' => 'required',
            'status_ruangan' => 'required',
        ]);

        Ruangan::create($request->all());
        
        return redirect()->route('ruangan.index')->with('success','Post created successfully');
    }

    public function show( $id)
    {
        return view('ruangan.show', [
            'ruangan' => Ruangan::findOrFail($id)]);
    }
    
    public function edit($id)
    {
        $ruangan = Ruangan::findOrFail($id);
        $lantai = Lantai::all();

        return view('ruangan.edit',compact('ruangan', 'lantai'));
    }
  
    public function update(Request $request, Ruangan $ruangan)
    {
        $request->validate([
            'no_ruangan' => 'required',
            'id_lantai' => 'required',
            'harga_ruangan' => 'required',
            'status_ruangan' => 'required',
        ]);
         
        $ruangan->update($request->all());
         
        return redirect()->route('ruangan.index')
                        ->with('success','Data ruangan berhasil ditambahkan!');
    }
  
    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();
  
        return redirect()->route('ruangan.index')
                        ->with('success','Data ruangan berhasil dihapus!');
    }

    public function api($id)
    {
        $data = Ruangan::findOrFail($id);
        return $data;
    }
}
