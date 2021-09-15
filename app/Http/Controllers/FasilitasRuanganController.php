<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasRuangan;
use App\Models\Ruangan;
use App\Models\TipeRuangan;


class FasilitasRuanganController extends Controller
{    
    public function index()
    {
        $fasilitas_ruangan = FasilitasRuangan::latest()->paginate(5);
        
        return view('fasilitasruangan.index',compact('fasilitas_ruangan'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $tipe_ruangan = TipeRuangan::all();
        return view('fasilitasruangan.create', compact('tipe_ruangan'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'no_ruangan'                => 'required',
            'id_tipe_ruangan'           => 'required',
            'nama_fasilitas_ruangan'    => 'required',
            'jumlah'                    => 'required',
            'status_fasilitas_ruangan'  => 'required',
        ]);

        FasilitasRuangan::create($request->all());
        
        return redirect()->route('fasilitasruangan.index')->with('success','Data baru berhasil ditambahkan');
    }

    public function show( $id)
    {
        return view('fasilitasruangan.show', [
            'fasilitas_ruangan' => FasilitasRuangan::findOrFail($id)]);
    }
    
    public function edit( $id)
    {
        $fasilitas_ruangan = FasilitasRuangan::findOrFail($id);
        $tipe_ruangan = TipeRuangan::all();

        return view('fasilitasruangan.edit',compact('fasilitas_ruangan', 'tipe_ruangan'));
    }
  
    public function update(Request $request, $id)
    {
        FasilitasRuangan::findOrFail($id)->update([
            'no_ruangan'                => $request->no_ruangan,
            'tipe_ruangan'              => $request->tipe_ruangan,
            'nama_fasilitas_ruangan'    => $request->nama_fasilitas_ruangan,
            'jumlah'                    => $request->jumlah,
            'status_fasilitas_ruangan'  => $request->status_fasilitas_ruangan
        ]);
         
        return redirect()->route('fasilitasruangan.index')
                        ->with('success','Data fasilitas ruangan berhasil ditambahkan!');
    }
  
    public function destroy( $id)
    {
        $fasilitas_ruangan = FasilitasRuangan::destroy($id);
  
        return redirect()->route('fasilitasruangan.index')
                        ->with('success','Data fasilitas ruangan berhasil dihapus!');
    }
}
