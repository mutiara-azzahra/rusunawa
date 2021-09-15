@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Daftar Ruangan</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success btn-secondary" href="{{ route('ruangan.index') }}"> Kembali</a>
                </div>
            </div>
        </div>        
    </div>

    
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Maaf!</strong> Ada yang salah.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('ruangan.store') }}" method="POST">
        @csrf
        
        <div class="card" style="padding: 30px;">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nomor Ruangan</strong>
                        <input type="text" name="no_ruangan" class="form-control" placeholder="Isi Nomor Ruangan">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Harga Ruangan</strong>
                        <input type="text" name="harga_ruangan" class="form-control" placeholder="Isi Harga Ruangan">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status Ruangan</strong>
                        <select name="status_ruangan" class="form-control" >
                            <option value="">---Pilih Status--</option>
                            <option>Terisi</option>
                            <option>Kosong</option>
                            <option>Rusak</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lantai</strong>
                        <select name="id_lantai" class="form-control" >
                            <option value="">---Pilih Lantai--</option>
                            @foreach($lantai as $l)
                            <option value=" {{ $l->id_lantai }}">Lantai {{ $l->lantai }} - {{$l->gedung->nama_gedung}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>        
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <div class="float-right">
                        <button type="submit" class="btn btn-success btn-primary">Simpan Data</button>
                    </div>
                </div>
            </div>        
        </div>

     
    </form>
</div>
@endsection