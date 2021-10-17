<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\TransaksiPembayaran;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransaksiPembayaranExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $tanggal_awal;
    protected $tanggal_akhir;

    public function __construct($tanggal_awal, $tanggal_akhir)
    {
        $this->tanggal_awal = $tanggal_awal;
        $this->tanggal_akhir = $tanggal_akhir;
    }

    public function collection()
    {
        return TransaksiPembayaran::whereBetween('created_at', [$this->tanggal_awal, $this->tanggal_akhir])->get()->map(function($item){
            $item->no               = '-';
            $item->no_registrasi    = $item->id_transaksi_pembayaran;
            $item->nama             = $item->pemohon->nama_kepala_keluarga;
            $item->blok             = '-';
            $item->lantai           = $item->ruangan->lantai->lantai;
            $item->no_ruangan       = $item->ruangan->no_ruangan;
            $item->harga_ruangan    = 'Rp. '.$item->ruangan->harga_ruangan;
            $item->bulan            = $item->detail_transaksi_pembayaran->implode('bulan',',');
            $item->tahun            = Carbon::parse($item->created_at)->translatedFormat('Y');
            $item->tanggal_validasi = Carbon::parse($item->created_at)->translatedFormat('d F Y');

            $item->tahun_validasi   = Carbon::parse($item->created_at)->translatedFormat('Y');
            $item->jumlah_bulan     = '-';
            $item->retribusi        = 'Rp. '.$item->ruangan->harga_ruangan;
            $item->total_bayar      = 'Rp. '.$item->detail_transaksi_pembayaran->sum('harga');
         
            return $item->only(['no','id_transaksi_pembayaran','nama',
                'blok','lantai','no_ruangan','harga_ruangan',
                'bulan','tanggal_validasi','tahun_validasi',
                'jumlah_bulan','retribusi','total_bayar', 
                'jumlah', 'piutang', 'penerimaan']);
        });
    }

    public function headings(): array
    {
        return [
            ['PENERIMAAN RUSUNAWA'],
            ['BULAN '],
            ['BULAN ' => Carbon::parse($this->tanggal_awal)->translatedFormat('M Y')],
            ['No','No Registrasi','Nama','Blok','Lantai','No','Besaran Per Bulan','Bulan','Tanggal Validasi','Tahun','Retribusi','Total']
        ];
    }
}
