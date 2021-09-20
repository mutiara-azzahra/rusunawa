@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;" >
    <div class="row mt-3">
        <div class="col-lg-12 margin-tb mb-5">
            <div class="float-left">
                <h2>Informasi Ruangan</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href=""><i class="fas fa-arrow-left"></i>Kembali</a>
            </div>
        </div>
    </div>
 

    <div class="card" style="padding:30px;">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Penghuni</strong><br>
                    {{ $pemohon->nama_kepala_keluarga }}<br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>No Ruangan</strong><br>
                    {{ $pemohon->id_ruangan }}<br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gedung</strong><br>
                    {{ $pemohon->id_gedung }}<br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Masa Sewa Rusun</strong><br>
                    bulan awal, tahun - bulan akhir, tahun <br>
                </div>
            </div>
        </div>    
    </div>

</div>
@endsection