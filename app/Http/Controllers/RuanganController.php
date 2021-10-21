<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\Lantai;
use App\Models\Gedung;


class RuanganController extends Controller
{    
    public function index()
    {
        $ruangan = Ruangan::latest()->get();
        
        return view('ruangan.index',compact('ruangan'));
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
            'no_ruangan'        => 'required',
            'id_lantai'         => 'required',
            'harga_ruangan'     => 'required',
            'status_ruangan'    => 'required',
        ]);

        $input = $request->all();
        $input['harga_ruangan'] = Str::remove('.', $request->harga_ruangan);
        
        Ruangan::create($input);
        
        return redirect()->route('ruangan.index')->with('success','Data ruangan baru berhasil ditambahkan!');
    }

    public function show( $id)
    {
        return view('ruangan.show', [
            'ruangan' => Ruangan::findOrFail($id)]);
    }
    
    public function edit($id)
    {
        $ruangan    = Ruangan::findOrFail($id);
        $lantai     = Lantai::all();

        return view('ruangan.edit',compact('ruangan', 'lantai'));
    }
  
    public function update(Request $request, Ruangan $ruangan)
    {
        $request->validate([
            'no_ruangan'        => 'required',
            'id_lantai'         => 'required',
            'harga_ruangan'     => 'required',
            'status_ruangan'    => 'required',
        ]);
         
        $ruangan->update($request->all());
         
        return redirect()->route('ruangan.index')
                        ->with('success','Data ruangan berhasil diubah!');
    }
  
    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();
  
        return redirect()->route('ruangan.index')
                        ->with('success','Data ruangan berhasil dihapus!');
    }

    public function api_lantai($id)
    {
        $data = Ruangan::where('id_lantai', $id)->get();

        return json_encode($data);
    }
    public function api_harga($id)
    {
        $data = Ruangan::findOrFail($id);

        return json_encode($data);
    }
}
