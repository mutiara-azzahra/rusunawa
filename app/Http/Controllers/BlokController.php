<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blok;

class BlokController extends Controller
{    
    public function index()
    {
        $blok = Blok::latest()->paginate(5);
        
        return view('blok.index',compact('blok'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $blok = Blok::all();
        return view('blok.create', compact('blok'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'nama_kota'     => 'required',
        ]);

        Blok::create($request->all());
        
        return redirect()->route('blok.index')->with('success','Data baru berhasil ditambahkan');
    }

    public function show( $id)
    {
        return view('blok.show', [
            'blok' => Blok::findOrFail($id)]);
    }
    
    public function edit( $id)
    {
        $blok = Blok::findOrFail($id);

        return view('blok.edit',compact('blok'));
    }
  
    public function update(Request $request, Blok $blok)
    {
        $request->validate([
            'blok'     => 'required',
        ]);
         
        $blok->update($request->all());
         
        return redirect()->route('blok.index')
                        ->with('success','Data blok berhasil ditambahkan!');
    }
  
    public function destroy( $id)
    {
        $blok = Blok::destroy($id);
  
        return redirect()->route('blok.index')
                        ->with('success','Data blok berhasil dihapus!');
    }
    
}
