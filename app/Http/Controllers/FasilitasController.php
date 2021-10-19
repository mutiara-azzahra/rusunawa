<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use App\Models\Gedung;


class FasilitasController extends Controller
{    
    public function index()
    {
        $fasilitas = Fasilitas::latest()->paginate(5);
        
        return view('fasilitas.index',compact('fasilitas'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $gedung = Gedung::all();
        return view('fasilitas.create', compact('gedung'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'nama_fasilitas'             => 'required',
            'kategori_fasilitas'         => 'required',
            'jumlah_fasilitas'           => 'required',
            'status_fasilitas'           => 'required',
            'icon'                       => 'required|mimes:jpg,png,jpeg',
        ]);


        $input = $request->all();
        $nama_foto      = $input['nama_fasilitas'].'_'.$request->icon->getClientOriginalName();
        $input['icon']  = $nama_foto;
        $request->file('icon')->move('storage/icon_galeri/', $nama_foto);

        Fasilitas::create($input);

        return redirect()->route('fasilitas.index', $request->id_fasilitas)->with('success','Data baru berhasil dibuat!');
    }
    // public function fasilitasGedung($id)
    // {
    //     $gedung = Gedung::findOrFail($id);
         
    //     $fasilitas->update($request);
         
    //     return redirect()->route('gedung.show', compact('fasilitas'));
    // }

    public function show( $id)
    {
        return view('fasilitas.show', [
            'fasilitas' => Fasilitas::findOrFail($id)]);
    }
    
    public function edit( $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        return view('fasilitas.edit',compact('fasilitas'));
    }
  
    public function update(Request $request, $id)
    {
        $fasilitas      = Fasilitas::findOrFail($id);
        $input          = $request->all();
        $nama_foto      = $input['nama_fasilitas'].'_'.$request->icon->getClientOriginalName();
        $input['icon']  = $nama_foto;

        $request->file('icon')->move('storage/icon_galeri/', $nama_foto);
            
        $fasilitas->update($input);
         
        return redirect()->route('fasilitas.index')
                        ->with('success','Data fasilitas berhasil diubah!');
    }
  
    public function destroy( $id)
    {
        $fasilitas = Fasilitas::destroy($id);
  
        return redirect()->route('fasilitas.index')
                        ->with('success','Data fasilitas umum berhasil dihapus!');
    }

    
}
