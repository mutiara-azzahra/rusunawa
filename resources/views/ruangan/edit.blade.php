@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Ubah Ruangan</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success btn-secondary" href="{{ route('ruangan.index') }}"> Kembali</a>
                </div>
            </div>
        </div>
    </div>

 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="{{ route('ruangan.update',$ruangan->id_ruangan) }}" method="POST">
        @csrf
        @method('PUT')
 
        <div class="card" style="padding:30px;">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nomor Ruangan</strong>
                        <input type="text" name="no_ruangan" class="form-control" placeholder="" value="{{ $ruangan->harga_ruangan }}">
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Harga Ruangan</strong>
                        <input type="text" name="harga_ruangan" class="form-control" placeholder="" value="{{ $ruangan->harga_ruangan }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status Ruangan</strong>
                        <select name="status_ruangan" class="form-control" value="{{ $ruangan->status_ruangan }}">
                            <option value="">---Pilih Status--</option>
                            <option>Terisi</option>
                            <option>Kosong</option>
                            <option>Rusak</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Blok</strong>
                        <select name="blok" class="form-control" value="{{ $ruangan->blok }}">
                            <option value="">---Pilih Blok--</option>
                            <option>Tidak Blok</option>
                            <option>Blok A</option>
                            <option>Blok B</option>
                            <option>Blok C</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lantai</strong>
                        <select name="lantai" class="form-control" value="{{ $ruangan->lantai }}">
                            <option value="">---Pilih Lantai--</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gedung</strong>
                        <input type="text" name="id_gedung" class="form-control" placeholder="" value="{{ $ruangan->id_gedung }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Pengajuan</strong>
                        <input type="text" name="id_pengajuan" class="form-control" placeholder="" value="{{ $ruangan->id_pengajuan }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tipe Ruangan</strong>
                        <input type="text" name="id_tipe_ruangan" class="form-control" placeholder="" value="{{ $ruangan->tipe_ruangan }}">
                    </div>
                </div>  
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <div class="float-right">
                        <button type="submit" class="btn btn-success btn-primary"> Simpan Data</button>
                    </div>
                </div>
            </div>        
        </div>

    </form>
</div>
@endsection