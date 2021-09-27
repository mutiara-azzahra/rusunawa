<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemohon;


class AdminController extends Controller
{
    public function AdminBeranda()
    {
        $user = auth()->user();        
        $pemohon = Pemohon::where('id_user', $user->id_user)->first();

        $pemohonall = Pemohon::all()->map(function($p){
            return $p->transaksi_pembayaran;
        });
        return view('index',compact('user','pemohon'));
    }
    public function pemohon()
    {
        $user = Auth::user();
        $pemohon = Pemohon::where('id_user', $user->id_user)->first();
        $transaksi_pembayaran = TransaksiPembayaran::where('id_pemohon', $user->id_user)->where('tahun', Carbon::now()->format('Y'))->pluck('id');

        return view('index',compact('pemohon', 'transaksi_pembayaran'));
    }
}
