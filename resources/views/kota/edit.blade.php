@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Ubah Kelurahan</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('kelurahan.index') }}"> Kembali</a>
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
 
    <form action="{{ route('kelurahan.update',$kelurahan->id_kelurahan) }}" method="POST">
        @csrf
        @method('PUT')
 
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kelurahan</strong>
                    <input type="text" name="nama_kelurahan" class="form-control" placeholder="" value="{{ $kelurahan->nama_kelurahan }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kecamatan</strong>
                    <select name="id_kecamatan" class="form-control" >
                        <option value="">---Pilih Kecamatan--</option>
                        @foreach($kecamatan as $kc)
                        <option value=" {{ $kc->id_kecamatan }}"> {{ $kc->nama_kecamatan }} </option>
                        @endforeach
                    </select>
                </div>
            </div> 
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary"> Ubah</button>
            </div>
        </div>
    </form>
</div>
@endsection