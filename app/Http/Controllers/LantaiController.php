<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gedung;
use App\Models\Lantai;

class LantaiController extends Controller
{
    public function index()
    {
        $lantai = Lantai::latest()->paginate(5);
        
        return view('lantai.index',compact('lantai'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {   
        $gedung = Gedung::all();

        return view('lantai.create',compact('gedung'));

    }

    public function store(Request $request)
    {
        $request -> validate([
            'lantai'    => 'required',
            'id_gedung' => 'required',
        ]);

        Lantai::create($request->all());

        return redirect()->route('lantai.index')->with('success','Lantai created successfully');
    }

    public function show(Lantai $lantai)
    {

        return view('lantai.show',compact('lantai'));
    }
    
    public function edit(Lantai $lantai)
    {
        $gedung = Gedung::all();

        return view('lantai.create',compact('gedung'));
    }
  
    public function update(Request $request, Lantai $lantai)
    {
        $request->validate([
            'lantai'    => 'required',
            'id_gedung'     => 'required',
        ]);
         
        $lantai->update($request->all());
         
        return redirect()->route('lantai.index')
                        ->with('success','Lantai updated successfully');
    }
  
    public function destroy($id)
    {
        $lantai = Lantai::destroy($id);
  
        return redirect()->route('lantai.index')
                        ->with('success','Lantai deleted successfully');
    }
    public function api($id){

        $data = Lantai::where('id_gedung', $id)->get();
        
        return json_encode($data);
    }
}
