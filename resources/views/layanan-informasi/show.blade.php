@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Informasi Rusun</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('layanan-informasi.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>

    <div class="card" style="padding: 30px;">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Latar Belakang</strong><br>
                    {{ $info_rusun->latar_belakang }}<br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tipologi Bangunan</strong><br>
                    {{ $info_rusun->tipologi_bangunan }}<br>
                </div>
            </div>  
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sumber Dana</strong><br>
                    {{ $info_rusun->sumber_dana }}<br>
                </div>
            </div>    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Persyaratan Huni</strong><br>
                    {{ $info_rusun->persyaratan_huni }}<br>
                </div>
            </div> 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tipologi Bangunan</strong><br>
                    {{ $info_rusun->tata_tertib }}<br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Larangan</strong><br>
                    {{ $info_rusun->larangan }}<br>
                </div>
            </div>         
        </div>        
    </div>

</div>
@endsection