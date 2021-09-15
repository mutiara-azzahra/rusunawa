@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Tambah Galeri</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success btn-secondary" href="{{ route('galeri.index') }}"> Kembali</a>
            </div>
        </div>
    </div>
</div>
    

<div class="card" style="padding:30px;">    
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
    
    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
     
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                <div class="form-group">
                    <strong>Kategori</strong>
                    <select name="kategori" class="form-control" >
                        <option value="" >---Pilih Kategori--</option>
                        <option>Gedung</option>
                        <option>Fasilitas Gedung</option>
                        <option>Ruangan Tanpa Kamar</option>
                        <option>Ruangan Dengan Kamar</option>
                        <option>Fasilitas Ruangan</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Foto</strong>
                    <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">                
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <div class="float-right">
                    <button type="submit" class="btn btn-success btn-primary">Simpan Data</button>
                </div>
            </div>
        </div>
     
    </form>
    </div>
</div>
@endsection