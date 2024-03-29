<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\TransaksiPembayaran;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class TransaksiPembayaranExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
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
            if($item->ruangan->lantai->gedung->blok){
                $item->blok             = $item->ruangan->lantai->gedung->blok;
            }
            else{
                $item->blok = '-';
            }
            $item->gedung           = $item->ruangan->lantai->gedung->nama_gedung;
            $item->lantai           = $item->ruangan->lantai->lantai;
            $item->no_ruangan       = $item->ruangan->no_ruangan;
            $item->harga_ruangan    = 'Rp. '.$item->ruangan->harga_ruangan;
            $item->bulan            = $item->detail_transaksi_pembayaran->implode('bulan',',');
            $item->tahun            = Carbon::parse($item->created_at)->translatedFormat('Y');
            $item->tanggal_validasi = Carbon::parse($item->created_at)->translatedFormat('d F Y');

            $item->tahun_validasi   = Carbon::parse($item->created_at)->translatedFormat('Y');
            $item->jumlah_bulan     = $item->detail_transaksi_pembayaran->count();
            $item->retribusi        = 'Rp. '.$item->ruangan->harga_ruangan;
            $item->total_bayar      = 'Rp. '.$item->detail_transaksi_pembayaran->sum('harga');
         
            return $item->only(['no','id_transaksi_pembayaran','nama',
                'blok','gedung','lantai','no_ruangan','harga_ruangan',
                'bulan','tanggal_validasi','tahun_validasi',
                'jumlah_bulan','retribusi','total_bayar', 
                'jumlah', 'piutang', 'penerimaan']);
        });
    }

    public function headings(): array
    {
        return [
            ['PENERIMAAN RUSUNAWA'],
            ['BULAN ' => Carbon::parse($this->tanggal_awal)->translatedFormat('F Y')],
            [
                ''
            ],
            ['NO.','NO. REGISTRASI','NAMA','BLOK','GEDUNG','LANTAI','NO. RUANGAN',
                'BESARAN PER BULAN','BULAN','TANGGAL VALIDASI',
                'TAHUN','JUMLAH BULAN','RETRIBUSI','TOTAL'],
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $count = $this->collection()->count();
        $count = $count + 5;
        $cell   = 'A4:N' . $count;

        $sheet->mergeCells('A1:N1');
        $sheet->mergeCells('A2:N2');
        
        $sheet->getStyle('A1:N1')->applyFromArray(['aligment' => ['horizontal' => 'center']]);
        $sheet->getStyle('A2:N2')->applyFromArray(['aligment' => ['horizontal' => 'center']]);

        $sheet->getStyle('A4:N4')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('F07470');

        return [
            $cell => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ]
                ]
            ],
        ];
    }
}
