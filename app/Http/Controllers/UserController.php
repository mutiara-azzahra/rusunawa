<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{    
    public function index()
    {
        $user = User::latest()->paginate(5);
        
        return view('user.index',compact('user'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $role = Role::all();

        return view('user.create',compact('role'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'nama_user'     => 'required',
            'username'      => 'required',
            'email'         => 'required',
            'password'      => 'required',
            'id_role'       => 'required'
        ]);

        $input = $request->all();
        $input['password']      = Hash::make($request['password']);
        $input['password_baru'] = Hash::make($request['password_baru']);

        User::create($input);
        
        return redirect()->route('user.index')->with('success','User baru berhasil ditambahkan!');
    }

    public function show(User $user)
    {
        return view('user.show',compact('user'));
    }
    
    public function edit(User $user)
    {
        
        return view('user.edit',compact('user'));
    }
  
    public function update(Request $request, User $user)
    {
        $input = $request->all();

        $request->validate([
            'password'          => 'required',
            'password_baru'     => 'required'
        ]);


        $input['password_baru']  = Hash::make($request['password_baru']);
        if(Hash::check($request->password, $user->password))
        {
            $user->password = $input['password_baru'];
            
            $user->update();

            return redirect()->route('profil.show')
                            ->with('success','Password user berhasil diubah!');           
        }
        else{
            return redirect()->route('profil.show')
                            ->with('error','Password lama tidak sama');           

        }
         
        $user->update($request->all());
    }
  
    public function destroy(User $user)
    {
        $user->delete();
  
        return redirect()->route('user.index')
                        ->with('success','Data user berhasil dihapus!');
                        
    }
    public function reset($id)
    {

        $user           = User::findOrFail($id);
        $user->password = Hash::make('12345');
        $user->update();

        return redirect()->route('user.index')
                        ->with('success','Password user berhasil diganti menjadi 12345!');
    }

    
}
