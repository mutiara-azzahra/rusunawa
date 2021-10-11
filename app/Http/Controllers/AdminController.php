<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksiPembayaran;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Pemohon;
use App\Models\TransaksiPembayaran;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function AdminBeranda()
    {
        $user = auth()->user();        
        $pemohon = Pemohon::where('id_user', $user->id_user)->first();
// dd($pemohon);
        $pemohonall = Pemohon::all()->map(function($p){
            return $p->transaksi_pembayaran;
        });
        if(Auth::user()->id_role ==2)
        {

            $transaksi_pembayaran   = TransaksiPembayaran::where('id_pemohon', $pemohon->id_pemohon)->first();
            $month = Carbon::now()->translatedFormat('F');
            // dd($transaksi_pembayaran->id_transaksi_pembayaran); 
            // $detail = $transaksi_pembayaran->
            $detail = DetailTransaksiPembayaran::where('id_transaksi_pembayaran',$transaksi_pembayaran->id_transaksi_pembayaran)->whereBulan($month)->first();
            // dd($detail);
        }else{
            $detail = null;
        }

        return view('index',compact('user','pemohon','detail'));
    }
    public function pemohon()
    {
        $user = Auth::user();
        $pemohon = Pemohon::where('id_user', $user->id_user)->first();
        $transaksi_pembayaran = TransaksiPembayaran::where('id_pemohon', $user->id_user)->where('tahun', Carbon::now()->format('Y'))->pluck('id');

        
        return view('index',compact('pemohon', 'transaksi_pembayaran'));
    }
}
