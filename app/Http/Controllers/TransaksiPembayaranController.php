<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiPembayaran;
use App\Models\Ruangan;
use App\Models\Gedung;
use App\Models\Pemohon;
use App\Models\DetailTransaksiPembayaran;
use Illuminate\Support\Facades\Auth;


class TransaksiPembayaranController extends Controller
{
    public function index()
    {
        $transaksi_pembayaran = TransaksiPembayaran::latest()->paginate(5);
        return view('transaksipembayaran.index',compact('transaksi_pembayaran'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {

        $ruangan        = Ruangan::all();
        $pemohon        = Pemohon::all();
        $user           = Auth::user();
        return view('transaksipembayaran.create',compact('ruangan', 'pemohon', 'user'));
    }
    public function store(Request $request)
    {
        $request -> validate([
            'id_ruangan'        => 'required',
            'tahun'             => 'required',
            'harga'             => 'required',
            'id_pemohon'        => 'required',
            'id_user'           => 'required',
        ]);

        $transaksi = TransaksiPembayaran::create($request->all());

        foreach($request->bulan as $bulan)
        {
            DetailTransaksiPembayaran::create([
               'bulan'                      =>$bulan,
               'harga'                      =>$transaksi->harga,
               'id_transaksi_pembayaran'    =>$transaksi->id_transaksi_pembayaran,
            ]);
        }
        return redirect()->route('transaksipembayaran.index')->with('success','Data Transaksi Pembayaran berhasil ditambahkan');
    }

    public function show( $id)
    {
        $transaksi_pembayaran = TransaksiPembayaran::findOrFail($id);
        $detail_transaksi_pembayaran = DetailTransaksiPembayaran::where('id_transaksi_pembayaran', $transaksi_pembayaran->id_transaksi_pembayaran)->get();
        return view('transaksipembayaran.show', compact('transaksi_pembayaran', 'detail_transaksi_pembayaran'));
    }
    
    public function edit($id)
    {
        $transaksi_pembayaran = TransaksiPembayaran::findOrFail($id);
        $pemohon = Pemohon::all();

        return view('transaksipembayaran.edit',compact('transaksi_pembayaran', 'pemohon'));
    }
  
    public function update(Request $request, TransaksiPembayaran $transaksi_pembayaran)
    {
        $transaksi_pembayaran->update($request->all());
         
        return redirect()->route('transaksipembayaran.index')
                        ->with('success','Data Transaksi Pembayaran berhasil ditambahkan');
    }
  
    public function destroy($id)
    {
        $transaksi_pembayaran = TransaksiPembayaran::destroy($id);
  
        return redirect()->route('transaksipembayaran.index')
                        ->with('success','Data Transaksi Pembayaran berhasil ditambahkan');
    }

    public function pemohon_show()
    {
        $pemohon = Pemohon::where('id_user',Auth::user()->id)->first();
        // $transaksi_pembayaran = TransaksiPembayaran::where('id_pemohon', $pemohon->id_pemohon)->latest()->get();
        return view('transaksipembayaran.pemohon_index', compact('transaksi_pembayaran'));
    }
}
