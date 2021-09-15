<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;


class RoleController extends Controller
{
    public function index()
    {
        $role = Role::latest()->paginate(5);
        
        return view('role.index',compact('role'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'nama_role' => 'required',
        ]);

        Role::create($request->all());

        return redirect()->route('role.index')->with('success','role created successfully');
    }

    public function show(Role $role)
    {
        return view('role.show',compact('role'));
    }
    
    public function edit(Role $role)
    {
        return view('role.edit',compact('role'));
    }
  
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'nama_role' => 'required',
        ]);
         
        $role->update($request->all());
         
        return redirect()->route('role.index')
                        ->with('success','role updated successfully');
    }
  
    public function destroy(Role $role)
    {
        $role->delete();
  
        return redirect()->route('role.index')
                        ->with('success','role deleted successfully');
    }
}
