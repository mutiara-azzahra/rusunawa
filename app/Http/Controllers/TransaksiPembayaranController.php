<?php

namespace App\Http\Controllers;

use App\Exports\TransaksiPembayaranExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TransaksiPembayaran;
use App\Models\Ruangan;
use App\Models\Gedung;
use App\Models\Pemohon;
use App\Models\DetailTransaksiPembayaran;
use Illuminate\Support\Facades\Auth;
use PDF;


class TransaksiPembayaranController extends Controller
{
    public function index()
    {
        $transaksi_pembayaran = TransaksiPembayaran::latest()->paginate(5);

        return view('transaksi-pembayaran.index',compact('transaksi_pembayaran'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $ruangan        = Ruangan::all();
        $pemohon        = Pemohon::all();
        $user           = Auth::user();

        return view('transaksi-pembayaran.create',compact('ruangan', 'pemohon', 'user'));
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

        return redirect()->route('transaksi-pembayaran.index')->with('success','Data Transaksi Pembayaran berhasil ditambahkan');
    }

    public function show( $id)
    {
        $transaksi_pembayaran           = TransaksiPembayaran::findOrFail($id);
        $detail_transaksi_pembayaran    = DetailTransaksiPembayaran::where('id_transaksi_pembayaran', $transaksi_pembayaran->id_transaksi_pembayaran)->get();

        return view('transaksi-pembayaran.show', compact('transaksi_pembayaran', 'detail_transaksi_pembayaran'));
    }
    
    public function edit($id)
    {
        $transaksi_pembayaran   = TransaksiPembayaran::findOrFail($id);
        $pemohon                = Pemohon::all();

        return view('transaksi-pembayaran.edit',compact('transaksi_pembayaran', 'pemohon'));
    }
  
    public function update(Request $request, TransaksiPembayaran $transaksi_pembayaran)
    {
        $transaksi_pembayaran->update($request->all());
         
        return redirect()->route('transaksi-pembayaran.index')
                        ->with('success','Data Transaksi Pembayaran berhasil ditambahkan');
    }
  
    public function destroy($id)
    {
        $transaksi_pembayaran = TransaksiPembayaran::destroy($id);
  
        return redirect()->route('transaksi-pembayaran.index')
            ->with('success','Data Transaksi Pembayaran berhasil ditambahkan');
    }

    public function pemohon_show()
    {
        $user_id                = Auth::id();
        $pemohon                = Pemohon::where('id_user', $user_id)->first();
        $transaksi_pembayaran   = TransaksiPembayaran::where('id_pemohon', $pemohon->id_pemohon)->latest()->paginate(10);

        return view('transaksi-pembayaran.pemohon_index', compact('transaksi_pembayaran'));
    }
    public function notif_bayar(){
        $id_pemohon                = Auth::id();
        
        return view ('index', compact('transaksi_pembayaran'));
    }
    public function filter()
    {
        return view('transaksi-pembayaran.filter');
    }
    public function cetak_transaksi_pembayaran_bulanan(Request $request)
    {
        $data           = TransaksiPembayaran::whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])->get();
        $tanggal_awal   = $request->tanggal_awal;
        $tanggal_akhir  = $request->tanggal_akhir;

        return Excel::download(new TransaksiPembayaranExport($tanggal_awal, $tanggal_akhir), 'transaksi-pembayaran-rusunawa.xlsx');
    }
}
