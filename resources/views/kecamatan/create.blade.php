@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="container" style="padding: 20px; padding-bottom: 30px;">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Tambah Kecamatan</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('kecamatan.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Ada yang salah<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="card" style="padding: 20px;">
            <form action="{{ route('kecamatan.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Kota</strong>
                            <select name="id_kota" class="form-control" >
                                <option value="">---Pilih Kota--</option>
                                @foreach($kota as $k)
                                <option value=" {{ $k->id_kota }}"> {{ $k->nama_kota }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama Kecamatan</strong>
                            <input type="text" name="nama_kecamatan" class="form-control" placeholder="Isi nama kecamatan...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <div class="float-right">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Data</button>                            
                        </div>
                    </div>
                </div>
            </form>        
        </div>

    </div>
</div>
@endsection