<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pemohon;
use App\Models\TransaksiPembayaran;
use App\Models\DetailTransaksiPembayaran;
use App\Models\Ruangan;
use App\Models\Gedung;
use App\Models\Lantai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PDF;

class PemohonController extends Controller
{    
    public function index()
    {
        $pemohon = Pemohon::latest()->paginate(5);
        
        return view('pemohon.index',compact('pemohon'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $pilih_ruangan = null;

        $ruangan    = Ruangan::all();
        $gedung     = Gedung::all();
        $lantai     = Lantai::all();
        $user       = auth()->user();
        $pemohon    = Pemohon::where('id_user', $user->id_user)->first();

        
        if($pemohon->id_ruangan)
        {
            return redirect()->route('pemohon_user.show',$pemohon->id_pemohon);
        }
        else
        {
            return view('pemohon.create',compact('ruangan', 'lantai', 'gedung', 'pilih_ruangan', 'user', 'pemohon'));
        }

    }

    public function store(Request $request)
    {
        if(Auth::user()->id_role == 2){
            $request -> validate([
                'nama_kepala_keluarga'              => 'required',
                'nik_kepala_keluarga'               => 'required',
                'pekerjaan_kepala_keluarga'         => 'required',
                'nama_kepala_keluarga'              => 'required',
                'alamat'                            => 'required',
                'jumlah_anggota_keluarga'           => 'required',
            ]);
        }
        
        else{
            $request -> validate([
            'nama_kepala_keluarga'              => 'required',
            'nik_kepala_keluarga'               => 'required',
            'pekerjaan_kepala_keluarga'         => 'required',
            'nama_kepala_keluarga'              => 'required',
            'alamat'                            => 'required',
            'no_hp'                             => 'required',
            'jumlah_anggota_keluarga'           => 'required',
            'id_gedung'                         => 'required',
            'id_lantai'                         => 'required',
            'id_ruangan'                        => 'required',
            'foto_ktp'                          => 'required|mimes:jpg,png,jpeg',
            'foto_akta_nikah'                   => 'required|mimes:jpg,png,jpeg',
            'foto_surat_keterangan_penghasilan' => 'required|mimes:jpg,png,jpeg',
            'foto_anggota_keluarga'             => 'required|mimes:jpg,png,jpeg',
            ]);
        }
        $input = $request->all();

        if($request->foto_ktp){
            $nama_ktp = $input['nama_kepala_keluarga'].'_'.$request->foto_ktp->getClientOriginalName();
            $input['foto_ktp']= $nama_ktp;
            $request->file('foto_ktp')->move('storage/lampiran_pemohon/', $nama_ktp);
        }

        if($request->foto_akta_nikah){
            $nama_akta_nikah = $input['nama_kepala_keluarga'].'_'.$request->foto_akta_nikah->getClientOriginalName();
            $input['foto_akta_nikah']= $nama_akta_nikah;
            $request->file('foto_akta_nikah')->move('storage/lampiran_pemohon/', $nama_akta_nikah);            
        }

        if($request->foto_surat_keterangan_penghasilan){
            $nama_surat_keterangan_penghasilan = $input['nama_kepala_keluarga'].'_'.$request->foto_ktp->getClientOriginalName();
            $input['foto_surat_keterangan_penghasilan']= $nama_surat_keterangan_penghasilan;
            $request->file('foto_surat_keterangan_penghasilan')->move('storage/lampiran_pemohon/', $nama_surat_keterangan_penghasilan);            
        }

        if($request->foto_anggota_keluarga){
            $nama_anggota_keluarga = $input['nama_kepala_keluarga'].'_'.$request->foto_anggota_keluarga->getClientOriginalName();
            $input['foto_anggota_keluarga']= $nama_anggota_keluarga;
            $request->file('foto_anggota_keluarga')->move('storage/lampiran_pemohon/', $nama_anggota_keluarga);            
        }

        $input['id_role']  = 2;
        if(Auth::user()->id_role == 1)
        {
            $input['nama_user']         = $request->nama_kepala_keluarga;
            $input['password']          = Hash::make($request['password']);
            $user                       = User::create($input);

            $input['id_user']           = $user->id_user;
            $input['status_pengajuan']  = 'disetujui';
            $data                       = Pemohon::create($input);

            return redirect()->route('pemohon.index')->with('success','Data baru berhasil ditambahkan');

        }else{
            $pemohon                    = Pemohon::where('id_user', Auth::user()->id_user)->first();
            $input['status_pengajuan']  = 'diproses';
            $input['id_user']           = Auth::user()->id_user;
            $data                       = $pemohon->update($input);

            return redirect()->route('pemohon_user.show',$pemohon->id_pemohon)->with('success','Permohonan ditambahkan!');
        }
    }

    public function show( $id)
    {
        return view('pemohon.show', ['pemohon' => Pemohon::findOrFail($id)]);
    }
    
    public function edit( $id)
    {
        $pemohon = Pemohon::findOrFail($id);

        return view('pemohon.edit',compact('pemohon'));
    }
  
    public function update(Request $request, $id)
    {
        $pemohon = Pemohon::findOrFail($id);
        
        $request->validate([
            'foto_ktp'                          => 'required|mimes:jpg,png,jpeg',
            'foto_akta_nikah'                   => 'required|mimes:jpg,png,jpeg',
            'foto_surat_keterangan_penghasilan' => 'required|mimes:jpg,png,jpeg',
            'foto_anggota_keluarga'             => 'required|mimes:jpg,png,jpeg',
        ]);

        $input = $request->all();

        if($request->foto_ktp){
            $nama_ktp = $pemohon->nama_kepala_keluarga.'_'.$request->foto_ktp->getClientOriginalName();
            $input['foto_ktp']= $nama_ktp;
            $request->file('foto_ktp')->move('storage/lampiran_pemohon/', $nama_ktp);
        }

        if($request->foto_akta_nikah){
            $nama_akta_nikah = $pemohon->nama_kepala_keluarga.'_'.$request->foto_akta_nikah->getClientOriginalName();
            $input['foto_akta_nikah']= $nama_akta_nikah;
            $request->file('foto_akta_nikah')->move('storage/lampiran_pemohon/', $nama_akta_nikah);            
        }

        if($request->foto_surat_keterangan_penghasilan){
            $nama_surat_keterangan_penghasilan = $pemohon->nama_kepala_keluarga.'_'.$request->foto_ktp->getClientOriginalName();
            $input['foto_surat_keterangan_penghasilan']= $nama_surat_keterangan_penghasilan;
            $request->file('foto_surat_keterangan_penghasilan')->move('storage/lampiran_pemohon/', $nama_surat_keterangan_penghasilan);            
        }

        if($request->foto_anggota_keluarga){
            $nama_anggota_keluarga = $pemohon->nama_kepala_keluarga.'_'.$request->foto_anggota_keluarga->getClientOriginalName();
            $input['foto_anggota_keluarga']= $nama_anggota_keluarga;
            $request->file('foto_anggota_keluarga')->move('storage/lampiran_pemohon/', $nama_anggota_keluarga);            
        }

        $pemohon->update($input);
         
        return redirect()->route('pemohon.index')
                        ->with('success','Data pemohon berhasil ditambahkan!');
    }
  
    public function destroy($id)
    {
        $pemohon = Pemohon::destroy($id);
  
        return redirect()->route('pemohon.index')
                        ->with('success','Data pemohon berhasil dihapus');
    }

    public function create_halaman_depan(Request $request, $id)
    {
        $pilih_ruangan = Ruangan::findOrFail($request->id_ruangan);

        $ruangan    = Ruangan::all();
        $gedung     = Gedung::all();
        $lantai     = Lantai::all();
        $pemohon    = Pemohon::where('id_user',Auth::user()->id_user)->first();

        return view('pemohon.create',compact('ruangan', 'gedung', 'lantai', 'pilih_ruangan','pemohon'));
    }

    public function pilihgedung()
    {
        $gedung     = Gedung::all();
        $gedung->map(function($q){
            $q->id_lantai = $q->lantai->pluck('id_lantai');
         });

        $ruangan    = Ruangan::all();
        
        return view('pemohon.pilihgedung', compact('gedung', 'ruangan'));        
    }
    public function pilihruangan(Request $request, $id_gedung)
    {

        $gedung     = Gedung::findOrFail($id_gedung);
        $lantai     = Lantai::where('id_gedung', $gedung->id_gedung)->get();

        return view('pemohon.pilihruangan', compact('gedung', 'lantai'));        
    }
    public function pesanRuangan(Request $request)
    {
        $ruangan = Ruangan::where('id_ruangan',$request->id_ruangan)->first();
        $pemohon = Pemohon::where('id_user',Auth::user()->id_user)->first();

        $pemohon->id_gedung     = $ruangan->lantai->gedung->id_gedung;
        $pemohon->id_lantai     = $ruangan->lantai->id_lantai;
        $pemohon->id_ruangan    = $ruangan->id_ruangan;

        $pemohon->update();

        return redirect()->route('beranda', compact('ruangan'));
    }

    public function verifikasi($id, Request $request)
    {
        $pemohon                    = Pemohon::findOrFail($id);
        $pemohon->status_pengajuan  = 'diverifikasi';
        $pemohon->update();

        $ruangan = Ruangan::whereIdRuangan($pemohon->id_ruangan)->first();
        $ruangan->status_ruangan    = 'terisi';
        $ruangan->update();
        
        return redirect()->route('pemohon.index')
                        ->with('success','Pemohon behasil di verifikasi!');
    }
    public function tolak($id)
    {
        $pemohon    = Pemohon::findOrFail($id);
        $pemohon->status_pengajuan  = 'ditolak';
        $pemohon->update();

        return redirect()->route('pemohon.index')
                        ->with('success','Pengajuan pemohon ditolak!');

    }

    public function api($id, $tahun){

        $data = Pemohon::with('ruangan')->where('id_ruangan', $id)->first();
        
        if($data)
        {
            
            // $transaksi_pembayaran = TransaksiPembayaran::whereIdPemohon($data->id_pemohon)->first();
            // $detail_transaksi_pembayaran = DetailTransaksiPembayaran::whereIdTransaksiPembayaran($transaksi_pembayaran->id_transaksi_pembayaran)->get()->pluck('bulan');

            $transaksi_pembayaran = TransaksiPembayaran::whereIdPemohon($data->id_pemohon)
                                                        ->where('tahun',$tahun)
                                                        ->get()
                                                        ->pluck('id_transaksi_pembayaran');

            $detail_transaksi_pembayaran = DetailTransaksiPembayaran::whereIn('id_transaksi_pembayaran',$transaksi_pembayaran)->get()->pluck('bulan');

            return ['data' => $data, 'detail' => $detail_transaksi_pembayaran];

        }else{
            return '0';
        }
    }

    public function updatefoto(Request $request, Pemohon $pemohon)
    {
        $request->validate([
            'foto_ktp'                          => 'required|mimes:jpg,png,jpeg',
            'foto_akta_nikah'                   => 'required|mimes:jpg,png,jpeg',
            'foto_surat_keterangan_penghasilan' => 'required|mimes:jpg,png,jpeg',
            'foto_anggota_keluarga'             => 'required|mimes:jpg,png,jpeg',
        ]);

        $pemohon->update($request->all());
         
        return redirect()->route('pemohon.index')
                        ->with('success','Data pemohon berhasil ditambahkan!');
    }

    public function update_foto(Request $request, Pemohon $pemohon)
    {
        $request->validate([
            'foto_ktp'                          => 'required',
            'foto_akta_nikah'                   => 'required',
            'foto_surat_keterangan_penghasilan' => 'required',
            'foto_anggota_keluarga'             => 'required',
        ]);

        $pemohon->update($request->all());
         
        return redirect()->route('pemohon.show')
                        ->with('success','Data pemohon berhasil ditambahkan!');
    }
    public function nonaktif($id)
    {
        $pemohon                    = Pemohon::findOrFail($id);
        $pemohon->status_permohonan = 'tidak aktif';
        $pemohon->update();

        return redirect()->route('penghuni.index')
                        ->with('success','Penghuni telah dinonaktifkan');
    }
    public function show_penghuni(){
    
        $pemohon = Pemohon::where('status_permohonan', 'aktif')->paginate(5);;
        
        return view('penghuni.index', compact('pemohon'));
    }
    public function cetak_pdf()
    {
        $data       = Pemohon::where('status_permohonan', 'aktif')->get();
        $pdf        = PDF::loadView('report.pemohon', ['data'=>$data]);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('nota-pembayaran-penghuni.pdf');
    }

}
