@extends('layouts.admin')

@section('content')

<div class="container" style="padding: 20px; padding-bottom: 30px;">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Tambah Fasilitas</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success btn-secondary" href="{{ route('fasilitas.index') }}"> Kembali</a>
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
        
        <form action="{{ route('fasilitas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card" style="padding:30px;">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Gedung</strong>
                            <select name="id_gedung" class="form-control" >
                                <option value="">---Pilih Gedung--</option>
                                @foreach($gedung as $g)
                                <option value=" {{ $g->id_gedung }}"> {{ $g->nama_gedung }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama Fasilitas</strong>
                            <input type="text" name="nama_fasilitas" class="form-control" placeholder="Isi nama fasilitas">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Kategori</strong>
                            <select name="kategori_fasilitas" class="form-control" >
                                <option value="">---Pilih Kategori--</option>
                                <option>Umum</option>
                                <option>Ruangan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Status Fasilitas Ruangan</strong>
                            <select name="status_fasilitas" class="form-control" >
                                <option value="">---Pilih Status--</option>
                                <option>Baik</option>
                                <option>Rusak</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Foto</strong>
                            <input type="file" name="icon" class="form-control-file" id="exampleFormControlFile1">                
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