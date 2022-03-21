@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2> Data Ruangan</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success btn-secondary" href="{{ route('ruangan.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>        
    </div>


    <div class="card" style="padding:30px;">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gedung</strong><br>
                    {{ $ruangan->lantai->gedung->nama_gedung  }}<br>
                </div>
            </div>  
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nomor Ruangan</strong><br>
                    {{ $ruangan->no_ruangan }}<br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga Ruangan</strong><br>
                    Rp. {{ $ruangan->harga_ruangan }},- / bulan<br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status Ruangan</strong><br>
                    {{ $ruangan->status_ruangan }}<br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lantai</strong><br>
                    Lantai {{ $ruangan->lantai->lantai }}<br>
                </div>
            </div> 
             
        </div>
    </div>

</div>
@endsection