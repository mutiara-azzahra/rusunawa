@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Data Pemohon</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('pemohon.index') }}"> Kembali</a>
            </div>
        </div>
    </div>
 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Pemohon</strong><br>
                {{ $pemohon->nama_kepala_keluarga }}<br>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIK</strong><br>
                {{ $pemohon->nik_kepala_keluarga }}<br>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pekerjaan</strong><br>
                {{ $pemohon->pekerjaan_kepala_keluarga }}<br>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat</strong><br>
                {{ $pemohon->alamat }}<br>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jumlah Anggota Keluarga</strong><br>
                {{ $pemohon->jumlah_anggota_keluarga }}<br>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Pengajuan</strong><br>
                {{ $pemohon->tanggal_pengajuan }}<br>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status Pengajuan</strong><br>
                {{ $pemohon->status_pengajuan }}<br>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Keterangan</strong><br>
                {{ $pemohon->keterangan }}<br>
            </div>
        </div>
    </div>
</div>
@endsection