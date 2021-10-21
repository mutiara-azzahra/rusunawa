<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;


class RegisterController extends Controller
{    
    public function index()
    {
        $pemohon = Register::latest()->paginate(5);
        
        return view('register.index',compact('pemohon'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('pemohon.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'nama_kepala_keluarga'      => 'required',
            'nik_kepala_keluarga'       => 'required',
            'pekerjaan_kepala_keluarga' => 'required',
            'no_kartu_keluarga'         => 'required',
            'nama_kepala_keluarga'      => 'required',
            'alamat'                    => 'required',
            'jumlah_anggota_keluarga'   => 'required',
            'tanggal_pengajuan'         => 'required'
        ]);

        Register::create($request->all());
        
        return redirect()->route('pemohon.index')->with('success','Data baru berhasil ditambahkan');
    }

    public function show( $id)
    {
        return view('pemohon.show', [
            'pemohon' => Register::findOrFail($id)]);
    }
    
    public function edit( $id)
    {
        $pemohon = Register::findOrFail($id);

        return view('pemohon.edit',compact('pemohon'));
    }

    public function destroy( $id)
    {
        $pemohon = Pemohon::destroy($id);
  
        return redirect()->route('pemohon.index')
            ->with('success','Data pemohon berhasil dihapus!');
    }
}