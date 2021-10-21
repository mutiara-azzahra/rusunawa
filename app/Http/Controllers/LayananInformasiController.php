<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rusun;
use App\Models\LayananInformasi;


class LayananInformasiController extends Controller
{    
    public function index()
    {
        $info_rusun = LayananInformasi::latest()->paginate(5);
        
        return view('layanan-informasi.index',compact('info_rusun'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $rusun = Rusun::all();

        return view('layanan-informasi.create', compact('rusun'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'latar_belakang'    => 'required',
            'tipologi_bangunan' => 'required',
            'sumber_dana'       => 'required',
            'persyaratan_huni'  => 'required',
            'tata_tertib'       => 'required',
            'larangan'          => 'required',

        ]);

        LayananInformasi::create($request->all());
        
        return redirect()->route('layanan-informasi.index')->with('success','Data baru berhasil ditambahkan');
    }

    public function show( $id)
    {
        return view('layanan-informasi.show', [
            'info_rusun' => LayananInformasi::findOrFail($id)]);
    }
    
    public function edit( $id)
    {
        $info_rusun = LayananInformasi::findOrFail($id);

        return view('info_rusun.edit',compact('info_rusun'));
    }
  
    public function update(Request $request, LayananInformasi $info_rusun)
    {
        $request->validate([
            'latar_belakang'    => 'required',
            'tipologi_bangunan' => 'required',
            'sumber_dana'       => 'required',
            'persyaratan_huni'  => 'required',
            'tata_tertib'       => 'required',
            'larangan'          => 'required',
        ]);
         
        $info_rusun->update($request->all());
         
        return redirect()->route('layanan-informasi.index')
                        ->with('success','Data rusun berhasil diubah!');
    }
  
    public function destroy( $id)
    {
        $info_rusun = LayananInformasi::destroy($id);
  
        return redirect()->route('layanan-informasi.index')
                        ->with('success','Data informasi berhasil dihapus!');
    }
    
}
