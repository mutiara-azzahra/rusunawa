@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2> Daftar Lantai</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('lantai.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
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
    
    <form action="{{ route('lantai.store') }}" method="POST">
        @csrf

        <div class="card" style="padding: 30px;">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lantai</strong> <span style="color: red" >*isi dalam angka</span>
                        <select name="lantai" class="form-control" >
                            <input type="text" name="lantai" class="form-control" placeholder="Isi lantai">
                        </select>
                    </div>
                </div>
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
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <div class="float-right">
                        <button type="submit" class="btn btn-success btn-primary"><i class="fas fa-save"></i> Simpan Data</button>
                    </div>
                </div>
            </div>               
        </div>

    </form>
</div>
@endsection