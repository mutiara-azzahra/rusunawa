@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Ubah Fasilitas Umum</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('fasilitas.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
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
 
    <form action="{{ route('fasilitas.update',$fasilitas->id_fasilitas) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card" style="padding: 30px;">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Fasilitas</strong>
                        <input type="text" name="nama_fasilitas" class="form-control" placeholder="" value="{{ $fasilitas->nama_fasilitas }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kategori</strong>
                        <input type="text" name="kategori_fasilitas" class="form-control" placeholder="" value="{{ $fasilitas->kategori_fasilitas }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status Fasilitas</strong>
                        <select name="status_fasilitas" class="form-control" value="{{ $fasilitas->status_fasilitas }}">
                            <option>---Pilih Status--</option>
                            <option>Baik</option>
                            <option>Rusak</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Foto</strong>
                        <input type="file" name="icon" class="form-control-file" id="exampleFormControlFile1">
                        <span style="color: red">*isi jika ingin merubah file </span>              
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <div class="float-right">
                        <button type="submit" class="btn btn-success"><i class="fas fa-success"></i> Simpan Data</button>                        
                    </div>

                </div>
            </div>        
        </div>

    </form>
</div>
@endsection