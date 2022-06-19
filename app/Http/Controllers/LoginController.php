<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rusun;
use App\Models\Gedung;
use App\Models\Ruangan;
use App\Models\Galeri;
use App\Models\Lantai;
use App\Models\Fasilitas;
use App\Models\SyaratMendaftar;
use App\Models\LayananInformasi;
use App\Models\Pemohon;
use App\Models\User;
use App\Models\Posts;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function formLogin()
    {
        return view('login');
    }
    
    public function LoginStore(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->route('beranda');
        }

        return back()->with('danger','Username atau password salah!');
    }

    public function formRegister()
    {
        $kelurahan  = Kelurahan::all();
        $kecamatan  = Kecamatan::all();
        $kota       = Kota::all();
        
       return view('register.create', compact('kelurahan', 'kecamatan', 'kota'));
    }
    public function RegsiterStore(Request $request){
        {
            $request -> validate([
                'nama_kepala_keluarga'              => 'required',
                'nik_kepala_keluarga'               => 'required',
                'pekerjaan_kepala_keluarga'         => 'required',
                'alamat'                            => 'required',
                'jumlah_anggota_keluarga'           => 'required'
            ]);
    
            $input = $request->all();
    
            $input['nama_user']         = $request->nama_kepala_keluarga;
            $input['password']          = Hash::make($request['password']);
            $input['id_role']           = 2;
            $user                       = User::create($input);

            $input['id_user']           = $user->id_user;
            $input['status_pengajuan']  = 'belum lengkap';
            $data                       = Pemohon::create($input);
    
            return redirect('login')->with('success','Silahkan lanjutkan login!');
        }

    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function Beranda()
    {
        $fasilitas          = Fasilitas::all();
        $gedung             = Gedung::withCount('ruangan');
        $rusun              = Rusun::all();
        $syarat_mendaftar   = SyaratMendaftar::all();
        $posts              = Posts::paginate(5);
        $info_rusun         = LayananInformasi::all();

        return view('welcome', compact('rusun', 'gedung', 'posts', 'fasilitas', 'syarat_mendaftar', 'info_rusun'));
    }

    public function faq()
    {
        $posts = Posts::paginate(5);

        return view('tanya-jawab',compact('posts'));
    }
    public function latarBelakang( $id)
    {
        $info_rusun = LayananInformasi::findOrFail( $id);

        return view('latar-belakang', compact('info_rusun'));
    }
    public function detailrusun($id)
    {
        $rusun  = Rusun::findOrFail($id);
        $gedung = Gedung::where('id_rusun',$rusun->id_rusun)->get();

        $gedung->map(function($q){
           $q->id_lantai = $q->lantai->pluck('id_lantai');
        });

        $ruangan = Ruangan::all();

        return view('detail-rusun.show', compact('rusun', 'gedung', 'ruangan'));
    }
    public function detailgedung($id)
    {
        
        $gedung     = Gedung::findOrFail($id);
        $lantai     = Lantai::where('id_gedung',$gedung->id_gedung)->get();
        $ruangan    = Ruangan::all();
        $galeri     = Galeri::where('id_gedung', $gedung->id_gedung)->get();

        return view('detail-gedung.show', compact('gedung', 'lantai', 'ruangan', 'galeri'));
    }
    public function lupaPassword()
    {
        return view('forgot-password');
    }
    public function cariEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
            
        if($user != null){
        }
        else{
            return redirect()->route('forgot-password')
                            ->with('warning','Email tidak ditemukan');
        }
        


    }


}
