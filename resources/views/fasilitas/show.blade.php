@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2> Fasilitas</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('fasilitas.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>


    <div class="card" style="padding: 30px;">     
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Fasilitas</strong><br>
                    {{ $fasilitas->nama_fasilitas }}<br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kategori</strong><br>
                    {{ $fasilitas->kategori }}<br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status</strong><br>
                    {{ $fasilitas->status_fasilitas }}<br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Icon</strong><br>
                    {{ $fasilitas->icon }}<br>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection