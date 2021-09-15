@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Ubah Gedung</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success btn-secondary" href="{{ route('gedung.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
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
 
    <form action="{{ route('gedung.update',$gedung->id_gedung) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card" style="padding:30px;">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Gedung</strong>
                        <input type="text" name="nama_gedung" class="form-control" placeholder="" value="{{ $gedung->nama_gedung }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Alamat</strong>
                        <input type="text" name="alamat_gedung" class="form-control" placeholder="" value="{{ $gedung->alamat_gedung }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jumlah Ruangan</strong>
                        <input type="text" name="jumlah_ruangan" class="form-control" placeholder="" value="{{ $gedung->jumlah_ruangan }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status Gedung</strong>
                        <select name="status_gedung" class="form-control" >
                            <option value="">---Pilih Status Gedung--</option>
                            <option>Penuh</option>
                            <option>Masih Tersedia</option>
                        </select> 
                </div>              
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <div class="float-right">
                        <button type="submit" class="btn btn-success btn-primary"> Ubah Data</button>                        
                    </div>
                </div>
            </div>        
        </div>

    </form>
</div>
@endsection