<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Pemohon;
use App\Models\Ruangan;
use App\Models\Gedung;
use App\Models\TransaksiPembayaran;
use App\Models\DetailTransaksiPembayaran;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function beranda()
    {
        $user = auth()->user();  
        $pemohon    = Pemohon::where('id_user', $user->id_user)->first();
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
            $month  = Carbon::now()->translatedFormat('F');
            $detail = DetailTransaksiPembayaran::where('id_transaksi_pembayaran',$transaksi_pembayaran->id_transaksi_pembayaran)->whereBulan($month)->first();
            }
            return view('beranda.user', compact('detail','transaksi_pembayaran','pemohon'));
            
        }
        else
        {
            $bulan_ini           = Carbon::now()->translatedFormat('F');
            $pembayaran          = DetailTransaksiPembayaran::where('bulan', Carbon::now()->translatedFormat('F'))->count();
            $pemohon             = Pemohon::where('status_permohonan','aktif')->count();
            $tunggakan           = $pemohon - $pembayaran;

            $detail_transaksi_pembayaran    = DetailTransaksiPembayaran::whereMonth('created_at', Carbon::now()->format('m'))->sum('harga');
            $pemohon_diproses   = Pemohon::where('status_pengajuan', 'diproses')->count();
            $pemohon_aktif      = Pemohon::where('status_permohonan', 'aktif')->count();
            $detail             = null;
            $ruangan_terisi     = Ruangan::whereHas('pemohon', function($query){
                                    $query->where('status_pengajuan', 'diverifikasi');
                                        })
                                        ->with('pemohon')
                                        ->count();


            $ruangan_kosong = Ruangan::count() - $ruangan_terisi;

            $gedung_dashboard   = Gedung::all();

            $LabelchartGedung = $gedung_dashboard->map(function($g){
                $g->ruangan = Ruangan::whereHas('lantai', function($l)use($g){
                    $l->where('id_gedung',$g->id_gedung);
                })->with('lantai')->count();

                return  $g->nama_gedung;
            });

            $ValuechartGedung = $gedung_dashboard->map(function($g){
                $g->ruangan = Ruangan::whereHas('lantai', function($l)use($g){
                    $l->where('id_gedung',$g->id_gedung);
                })->with('lantai')->count();

                return   $g->ruangan;
            });

            $bulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
            
            $pemasukan = collect($bulan)->map(function($b){
                            $harga = DetailTransaksiPembayaran::whereMonth('created_at',$b)->whereHas('transaksipembayaran', function($t){
                                $t->where('tahun',Carbon::now()->format('Y'));
                            })->sum('harga');

                            return $harga;
                        });
    
            return view('beranda.admin', compact('ruangan_terisi','ruangan_kosong',
                'pemohon_diproses', 'pemohon_aktif', 'detail_transaksi_pembayaran',
                'bulan_ini', 'pembayaran', 'tunggakan', 'LabelchartGedung', 'ValuechartGedung', 'pemasukan'));
        }
    }
    public function pemohon()
    {
        $user                   = Auth::user();
        $pemohon                = Pemohon::where('id_user', $user->id_user)->first();
        $transaksi_pembayaran   = TransaksiPembayaran::where('id_pemohon', $user->id_user)->where('tahun', Carbon::now()->format('Y'))->pluck('id');

        
        return view('index',compact('pemohon', 'transaksi_pembayaran'));
    }
}
