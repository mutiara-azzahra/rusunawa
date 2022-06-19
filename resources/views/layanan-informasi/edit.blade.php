@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Ubah Informasi Rusun</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('layanan-informasi.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
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
 
    <form action="{{ route('layanan-informasi.update',$info_rusun->id_info_rusun) }}" method="POST">
        @csrf
        @method('PUT')
 
        <div class="card" style="padding: 30px;">
            <form action="{{ route('layanan-informasi.store') }}" method="POST">
                @csrf
            
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Rusun</strong>
                            <select name="id_rusun" class="form-control" id="id_rusun">
                                <option value="">---Pilih Rusun--</option>
                                @foreach($rusun as $r)
                                <option value="{{ $r->id_rusun }}"> {{ $r->nama_rusun }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-outline card-info">
                          <div class="card-header"><b>Latar Belakang</b></div>
                            <div class="card-body pad">
                                <div class="mb-3">
                                    <textarea class="summernote" placeholder="Place some text here" name="latar_belakang">{{ $info_rusun->nama_rusun }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-outline card-info">
                          <div class="card-header"><b>Tipologi Bangunan</b></div>
                            <div class="card-body pad">
                                <div class="mb-3">
                                    <textarea class="summernote" placeholder="Place some text here" name="tipologi_bangunan"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-outline card-info">
                          <div class="card-header"><b>Sumber Dana</b></div>
                            <div class="card-body pad">
                                <div class="mb-3">
                                    <textarea class="summernote" placeholder="Place some text here" name="sumber_dana"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-outline card-info">
                          <div class="card-header"><b>Persyaratan Huni</b></div>
                            <div class="card-body pad">
                                <div class="mb-3">
                                    <textarea class="summernote" placeholder="Place some text here" name="persyaratan_huni"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-outline card-info">
                          <div class="card-header"><b>Tata Tertib</b></div>
                            <div class="card-body pad">
                                <div class="mb-3">
                                    <textarea class="summernote" placeholder="Place some text here" name="tata_tertib"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-outline card-info">
                          <div class="card-header"><b>Larangan</b></div>
                            <div class="card-body pad">
                                <div class="mb-3">
                                    <textarea class="summernote" placeholder="Place some text here" name="larangan"></textarea>
                                </div>
                            </div>
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
    </form>
</div>
@endsection