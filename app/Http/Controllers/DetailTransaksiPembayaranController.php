<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemohon;
use App\Models\TransaksiPembayaran;
use App\Models\DetailTransaksiPembayaran;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Auth;
use PDF;

class DetailTransaksiPembayaranController extends Controller
{
    public function index()
    {
        $detail_transaksi_pembayaran = DetailTransaksiPembayaran::latest()->paginate(5);
        
        return view('detail-transaksipembayaran.index',compact('detail_transaksi_pembayaran'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $ruangan        = Ruangan::all();
        $pemohon        = Pemohon::all();

        return view('detail-transaksipembayaran.create',compact('ruangan', 'pemohon'));
    }
    public function store(Request $request)
    {
        $request -> validate([
            'bulan'     => 'required',
            'tahun'     => 'required',
            'harga'     => 'required',
        ]);

        DetailTransaksiPembayaran::create($request->all());

        return redirect()->route('detail-transaksipembayaran.index')->with('success','Data Transaksi Pembayaran berhasil ditambahkan');
    }

    public function show( $id)
    {
        $transaksi_pembayaran = TransaksiPembayaran::findOrFail($id);
        $detail_transaksi_pembayaran = DetailTransaksiPembayaran::where('id_transaksi_pembayaran', $transaksi_pembayaran->id_transaksi_pembayaran)->get();


        return view('detail-transaksipembayaran.show', compact('transaksi_pembayaran', 'detail_transaksi_pembayaran'));
    }
    
    public function edit($id)
    {
        $detiail_transaksi_pembayaran = TransaksiPembayaran::findOrFail($id);
        $pemohon = Pemohon::all();

        return view('detail-transaksipembayaran.edit',compact('detail_transaksi_pembayaran', 'pemohon'));
    }
  
    public function update(Request $request, TransaksiPembayaran $transaksi_pembayaran)
    {
        $request->validate([
            'bulan'     => 'required',
            'tahun'     => 'required',
            'harga'     => 'required',
        ]);
         
        $transaksi_pembayaran->update($request->all());
        dd($request);
                 
        return redirect()->route('detail-transaksipembayaran.index')
                        ->with('success','Data Transaksi Pembayaran berhasil ditambahkan');
    }
  
    public function destroy($id)
    {
        $detail_transaksi_pembayaran = DetailTransaksiPembayaran::destroy($id);
  
        return redirect()->route('detail-transaksipembayaran.index')
                        ->with('success','Data Transaksi Pembayaran berhasil ditambahkan');
    }

    public function pemohon_show(Pemohon $pemohon)
    {
        $transaksi_pembayaran = TransaksiPembayaran::where('id_transaksi_pembayaran',Auth::user()->id)->first();
        $detail_transaksi_pembayaran = DetailTransaksiPembayaran::where('id_pemohon', $pemohon->id_pemohon)->latest()->get();
        
        return view('detail-transaksipembayaran.pemohon_index', compact('detail_transaksi_pembayaran'));
    }

    public function cetak_detail_transaksi_user($id)
    {
        $transaksi_pembayaran = TransaksiPembayaran::findOrFail($id);
        $data       = DetailTransaksiPembayaran::where('id_transaksi_pembayaran', $transaksi_pembayaran->id_transaksi_pembayaran)->get();
        $pdf        = PDF::loadView('report.detail-transaksi-pembayaran', ['data'=>$data, 'transaksi_pembayaran'=>$transaksi_pembayaran]);
        $pdf->setPaper('a4', 'potrait');

        return $pdf->stream('detail_transaksi_pembayaran.pdf');
    }
}

