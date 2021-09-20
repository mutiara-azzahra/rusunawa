@extends('layouts.admin')

@section('content')

<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Daftar Transaksi Pembayaran</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('transaksipembayaran.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>

    <div class="card" style="padding:30px;">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>No. Transaksi Pembayaran</strong><br>
                    {{ $detail_transaksi_pembayaran->id_transaksi_pembayaran }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Penghuni</strong><br>
                    {{ $detail_transaksi_pembayaran->id_pemohon }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bulan</strong><br>
                    {{ $detail_transaksi_pembayaran->bulan }}
                </div>
            </div>  
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tahun</strong><br>
                    {{ $detail_transaksi_pembayaran->tahun }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga</strong><br>
                    {{ $detail_transaksi_pembayaran->harga }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Pembayaran</strong><br>
                    {{ $transaksi_pembayaran->id_pemohon }}
                </div>
            </div>
        </div>    
    </div>
</div>

@endsection