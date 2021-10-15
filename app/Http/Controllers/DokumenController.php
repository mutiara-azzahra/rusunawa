<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemohon;
use App\Models\Dokumen;

class DokumenController extends Controller
{
    public function index()
    {
        $dokumen = Dokumen::latest()->paginate(5);
        
        return view('dokumen.index',compact('dokumen'));
    }

    public function create()
    {
        return view('dokumen.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'ktp'                   => 'required',
            'kartu_keluarga'        => 'required',
            'surat_keterangan_1'    => 'required',
            'surat_keterangan_2'    => 'required',
        ]);

            Dokumen::create($request->all());

        return redirect()->route('dokumen.index')->with('success','Dokumen berhasil dibuat!');
    }

    public function show(Dokumen $dokumen)
    {
        return view('dokumen.show',compact('dokumen'));
    }

    public function edit(Dokumen $dokumen)
    {

        return view('dokumen.edit',compact('dokumen'));
    }

    public function update(Request $request, Dokumen $dokumen)
    {
        $request->validate([
            'ktp'                   => 'required',
            'kartu_keluarga'        => 'required',
            'surat_keterangan_1'    => 'required',
            'surat_keterangan_2'    => 'required',            
        ]);
         
        $dokumen->update($request->all());
         
        return redirect()->route('dokumen.index')
                        ->with('success','Data dokumen berhasil diubah!');
    }

    public function destroy( $id, Dokumen $dokumen)
    {
        $dokumen->destroy($id);
  
        return redirect()->route('dokumen.index')
                        ->with('success','Data gedung berhasil dihapus!');
    }
}
