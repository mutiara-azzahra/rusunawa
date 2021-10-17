@extends('layouts.admin')
@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Cetak Rekap Transaksi Pembayaran</h2>
                <h4>Pilih Tanggal</h4>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('transaksi-pembayaran.index') }}"><i class="fas fa-plus"></i> Kembali</a>
            </div>
        </div>
    </div>
    <div class="card" style="padding: 20px;">
        <div class="card-body">
            <form action="{{ route('report.transaksi-pembayaran') }}" method="GET">
                @csrf
                <div class="form-group">
                    <label for="">Tanggal Awal</label>
                    <input type="date" name="tanggal_awal" id="" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Akhir</label>
                    <input type="date" name="tanggal_akhir" id="" class="form-control" placeholder="">
                </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-warning" href="{{ route('report.transaksi-pembayaran') }}"><i class="fas fa-print"></i> Cetak Data</button>
        </div>
    </form>
    </div>
</div>

 
@endsection