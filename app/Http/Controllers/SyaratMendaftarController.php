<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SyaratMendaftar;

class SyaratMendaftarController extends Controller
{    
    public function index()
    {
        $syarat_mendaftar = SyaratMendaftar::latest()->paginate(5);
        
        return view('syarat-mendaftar.index',compact('syarat_mendaftar'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $syarat_mendaftar = SyaratMendaftar::all();
        
        return view('syarat-mendaftar.create', compact('syarat_mendaftar'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'syarat_mendaftar'     => 'required',
        ]);

        SyaratMendaftar::create($request->all());
        
        return redirect()->route('syarat-mendaftar.index')->with('success','Data syarat mendaftar berhasil ditambahkan');
    }

    public function show( $id)
    {
        return view('syarat_mendaftar.show', [
            'syarat_mendaftar' => SyaratMendaftar::findOrFail($id)]);
    }
    
    public function edit( $id)
    {
        $syarat_mendaftar = SyaratMendaftar::findOrFail($id);

        return view('syarat_mendaftar.edit',compact('syarat_mendaftar'));
    }
  
    public function update(Request $request, SyaratMendaftar $syarat_mendaftar)
    {
        $request->validate([
            'syarat_mendaftar'     => 'required',
        ]);
         
        $syarat_mendaftar->update($request->all());
         
        return redirect()->route('syarat_mendaftar.index')
                        ->with('success','Data syarat mendaftar berhasil diubah!');
    }
  
    public function destroy( $id)
    {
        $syarat_mendaftar = SyaratMendaftar::destroy($id);
  
        return redirect()->route('syarat_mendaftar.index')
            ->with('success','Data syarat mendaftar berhasil dihapus!');
    }
    
}
