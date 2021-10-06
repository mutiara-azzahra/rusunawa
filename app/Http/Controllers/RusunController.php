<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rusun;


class RusunController extends Controller
{    
    public function index()
    {
        $rusun = Rusun::latest()->paginate(5);
        
        return view('rusun.index',compact('rusun'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $rusun = Rusun::all();
        return view('rusun.create', compact('rusun'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'nama_rusun'        => 'required',
            'alamat'            => 'required',
            'foto'              => 'required|mimes:jpg,png,jpeg',

        ]);

        $input = $request->all();

        if($request->foto){
            $nama_foto_rusun = $input['nama_rusun'].'_'.$request->foto->getClientOriginalName();
            $input['foto']= $nama_foto_rusun;
            $request->file('foto')->move('storage/rusun/', $nama_foto_rusun);
        }

        Rusun::create($input);
        
        return redirect()->route('rusun.index')->with('success','Data baru berhasil ditambahkan');    
    }

    public function show( $id)
    {
        return view('rusun.show', [
            'rusun' => Rusun::findOrFail($id)]);
    }
    
    public function edit( $id)
    {
        $rusun = Rusun::findOrFail($id);

        return view('rusun.edit',compact('rusun'));
    }
  
    public function update(Request $request, $id)
    {
        $rusun = Rusun::findOrFail($id);

        $request->validate([
            'nama_rusun'    => 'required',
            'alamat'        => 'required',
            'foto'          => 'required|mimes:jpg,png,jpeg',
        ]);
        
        $input = $request->all();

        $nama_foto_rusun = $input['nama_rusun'].'_'.$request->foto->getClientOriginalName();
        $input['foto']= $nama_foto_rusun;
        $request->file('foto')->move('storage/rusun/', $nama_foto_rusun);

        $rusun->update($input);
         
        return redirect()->route('rusun.index')->with('success','Data pemohon berhasil ditambahkan!');
    }
  
    public function destroy( $id)
    {
        $rusun = Rusun::destroy($id);
  
        return redirect()->route('rusun.index')
                        ->with('success','Data rusun berhasil dihapus!');
    }
    
}
