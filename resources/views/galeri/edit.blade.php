@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Ubah Galeri</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('galeri.index') }}"> Kembali</a>
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
 
    <form action="{{ route('galeri.update',$galeri->id_galeri) }}" method="POST">
        @csrf
        @method('PUT')
 
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kategori</strong>
                <input type="text" name="kategori" class="form-control" placeholder="" value="{{ $galeri->kategori }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto</strong>
                <input type="text" name="foto" class="form-control" placeholder="" value="{{ $galeri->foto }}">
            </div>
        </div>       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary"> Ubah</button>
        </div>
    </div>
    </form>
</div>
@endsection