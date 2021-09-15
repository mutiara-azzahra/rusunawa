<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gedung;
use App\Models\TipeRuangan;
use App\Models\Galeri;
use App\Models\Fasilitas;


class GedungController extends Controller

{
    public function index()
    {
        $gedung = Gedung::latest()->paginate(5);
        return view('gedung.index',compact('gedung'));
    }

    public function create()
    {
        $tipe_ruangan = TipeRuangan::all();
        return view('gedung.create', compact('tipe_ruangan'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'nama_gedung'       => 'required',
            'alamat_gedung'     => 'required',
            'jumlah_ruangan'    => 'required',
            'status_gedung'     => 'required',
            
        ]);

            Gedung::create($request->all());

        return redirect()->route('gedung.index')->with('success','Gedung berhasil dibuat!');
    }

    public function show( $id)
    {
        $gedung     = Gedung::findOrFail($id);
        $galeri     = Galeri::where('id_gedung', $gedung->id_gedung)->latest()->get();
        $fasilitas  = Fasilitas::where('id_gedung', $gedung->id_gedung)->latest()->get();

        return view('gedung.show', compact('gedung','galeri', 'fasilitas'));
    }

    public function edit(Gedung $gedung)
    {

        return view('gedung.edit',compact('gedung'));
    }

    public function update(Request $request, Gedung $gedung)
    {
        $request->validate([
            'nama_gedung'       => 'required',
            'alamat_gedung'     => 'required',
            'jumlah_ruangan'    => 'required',
            'status_gedung'     => 'required',
            
        ]);
         
        $gedung->update($request->all());
         
        return redirect()->route('gedung.index')
                        ->with('success','Data gedung berhasil diubah!');
    }

    public function destroy(Gedung $gedung)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $gedung->delete();
  
        return redirect()->route('gedung.index')
                        ->with('success','Data gedung berhasil dihapus!');
    }
}
