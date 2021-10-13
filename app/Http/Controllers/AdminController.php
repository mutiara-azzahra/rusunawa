<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksiPembayaran;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Pemohon;
use App\Models\Ruangan;
use App\Models\TransaksiPembayaran;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function beranda()
    {
        $user = auth()->user();  
        $pemohon = Pemohon::where('id_user', $user->id_user)->first();

        $pemohonall = Pemohon::all()->map(function($p){
            return $p->transaksi_pembayaran;
        });

        if(Auth::user()->id_role ==2)
        {

            $transaksi_pembayaran   = TransaksiPembayaran::where('id_pemohon', $pemohon->id_pemohon)->first();
            
            if(is_null($transaksi_pembayaran)){
                $detail = null;
            }
            else{
            $month = Carbon::now()->translatedFormat('F');
            $detail = DetailTransaksiPembayaran::where('id_transaksi_pembayaran',$transaksi_pembayaran->id_transaksi_pembayaran)->whereBulan($month)->first();
            }
            return view('beranda.user', compact('detail','transaksi_pembayaran', 'month'));
            
        }else{

            $pemohon_diproses = Pemohon::where('status_pengajuan', 'diproses')->count();
            $pemohon_aktif = Pemohon::where('status_permohonan', 'aktif')->count();
            $detail = null;
            $ruangan_terisi = Ruangan::whereHas('pemohon', function($query){
                $query->where('status_permohonan', 'aktif');

            })
            ->with('pemohon')
            ->count();


            $ruangan_kosong = Ruangan::count() - $ruangan_terisi;
            // dd($ruangan_terisi, $ruangan_kosong);
            return view('beranda.admin', compact('ruangan_terisi','ruangan_kosong', 'pemohon_diproses', 'pemohon_aktif'));
        }
    }
    public function pemohon()
    {
        $user = Auth::user();
        $pemohon = Pemohon::where('id_user', $user->id_user)->first();
        $transaksi_pembayaran = TransaksiPembayaran::where('id_pemohon', $user->id_user)->where('tahun', Carbon::now()->format('Y'))->pluck('id');

        
        return view('index',compact('pemohon', 'transaksi_pembayaran'));
    }
}
