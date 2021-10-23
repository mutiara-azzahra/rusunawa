<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Gedung;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->paginate(5);
        
        return view('galeri.index',compact('galeri'));
    }

    public function create()
    {
        $gedung = Gedung::all();
        return view('galeri.create', compact('gedung'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'kategori'  => 'required',
            'foto'      => 'required|mimes:jpg,png,jpeg',
            'id_gedung' => 'required',
        ]);

        $input          = $request->all();
        $nama_foto      = $input['kategori'].'_'.$request->foto->getClientOriginalName();
        $input['foto']  = $nama_foto;
        $request->file('foto')->move('storage/galeri/', $nama_foto);

        Galeri::create($input);

        return redirect()->route('gedung.show', $request->id_gedung)->with('success','Data baru berhasil dibuat!');
    }

    public function show(Galeri $galeri)
    {
        return view('galeri.show',compact('galeri'));
    }

    public function edit(Galeri $galeri)
    {

        return view('galeri.edit',compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'kategori'  => 'required',
            'foto'      => 'required|mimes:jpg,png,jpeg',
            'id_gedung' => 'required',
        ]);
         
        $galeri->update($request->all());
         
        return redirect()->route('galeri.index')
                        ->with('success','Data galeri berhasil diubah!');
    }

    public function destroy(Galeri $galeri)
    {
        Storage::delete('public/galeri/'.$galeri->foto);

        $galeri->delete();
  
        return redirect()->route('gedung.show', $galeri->id_gedung)
                        ->with('success','Data galeri berhasil dihapus!');
    }
}
