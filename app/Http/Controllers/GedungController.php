<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gedung;
use App\Models\TipeRuangan;
use App\Models\Ruangan;
use App\Models\Galeri;
use App\Models\Rusun;
use App\Models\Lantai;
use App\Models\Fasilitas;
use App\Models\FasilitasGedung;
use PhpParser\Node\Stmt\TryCatch;

class GedungController extends Controller

{
    public function index()
    {
        $gedung = Gedung::latest()->paginate(5);
        return view('gedung.index',compact('gedung'));
    }

    public function create()
    {
        $rusun          = Rusun::all();
        $tipe_ruangan   = TipeRuangan::all();

        return view('gedung.create', compact('tipe_ruangan', 'rusun'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'nama_gedung'       => 'required',
            'blok'              => 'required',
            'jumlah_ruangan'    => 'required',
            'status_gedung'     => 'required',
            
        ]);

        Gedung::create($request->all());

        return redirect()->route('gedung.index')->with('success','Gedung berhasil dibuat!');
    }

    public function show( $id)
    {
        $gedung             = Gedung::findOrFail($id);
        $galeri             = Galeri::where('id_gedung', $gedung->id_gedung)->latest()->get();
        $fasilitas          = Fasilitas::all();
        $fasilitas_gedung   = FasilitasGedung::where('id_gedung', $gedung->id_gedung)->latest()->get();
        $lantai            = Lantai::where('id_gedung', $id)->get('id_lantai');
        $ruangan            = Ruangan::whereIn('id_lantai', $lantai)->get();

        return view('gedung.show', compact('gedung','galeri', 'fasilitas', 'fasilitas_gedung', 'ruangan'));
    }

    public function edit(Gedung $gedung)
    {
        $tipe_ruangan = TipeRuangan::all();

        return view('gedung.edit',compact('gedung', 'tipe_ruangan'));
    }

    public function update(Request $request, Gedung $gedung)
    {
        $request->validate([
            'nama_gedung'       => 'required',
            'blok'              => 'required',
            'jumlah_ruangan'    => 'required',
            'status_gedung'     => 'required',
        ]);
         
        $gedung->update($request->all());
         
        return redirect()->route('gedung.index')
                        ->with('success','Data gedung berhasil diubah!');
    }

    public function destroy(Gedung $gedung)
    {
        try {
            $gedung->delete();

            return redirect()->route('gedung.index')
            ->with('success','Data gedung berhasil dihapus!');

        } catch (\Throwable $th) {
            return redirect()->route('gedung.index')
            ->with('warning', 'Terjadi kesalahan! Data '.$gedung->nama_gedung.' tidak dapat dihapus');
        }
    }
}
