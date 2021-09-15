@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Lantai</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success btn-secondary" href="{{ route('lantai.index') }}"> Kembali</a>
            </div>
        </div>
    </div>

    <div class="card" style="padding: 30px;">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lantai</strong><br>
                    {{ $lantai->lantai }}<br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gedung</strong><br>
                    {{ $lantai->gedung->nama_gedung }}<br>
                </div>
            </div>        
        </div>        
    </div>

</div>
@endsection