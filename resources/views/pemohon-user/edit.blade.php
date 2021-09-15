@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Ubah pemohon</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('pemohon.index') }}"> Kembali</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Maaf!</strong> Ada yang salah<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="{{ route('pemohon.update',$pemohon->id_pemohon) }}" method="POST">
        @csrf
        @method('PUT')
 
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama pemohon</strong>
                    <input type="text" name="nama_kepala_keluarga" class="form-control" placeholder="pemohon" value="{{ $pemohon->nama_kepala_keluarga }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIK</strong>
                    <input type="text" name="nik_kepala_keluarga" class="form-control" placeholder="pemohon" value="{{ $pemohon->nik_kepala_keluarga }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pekerjaan</strong>
                    <input type="text" name="pekerjaan_kepala_keluarga" class="form-control" placeholder="pemohon" value="{{ $pemohon->pekerjaan_kepala_keluarga }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>No Kartu Keluarga</strong>
                    <input type="text" name="no_kartu_keluarga" class="form-control" placeholder="pemohon" value="{{ $pemohon->no_kartu_keluarga }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat</strong>
                    <input type="text" name="alamat" class="form-control" placeholder="pemohon" value="{{ $pemohon->alamat }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jumlah Anggota Keluarga</strong>
                    <input type="text" name="jumlah_anggota_keluarga" class="form-control" placeholder="pemohon" value="{{ $pemohon->jumlah_anggota_keluarga }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Pengajuan</strong>
                    <input type="text" name="tanggal_pengajuan" class="form-control" placeholder="pemohon" value="{{ $pemohon->tanggal_pengajuan }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status Pengajuan</strong>
                    <input type="text" name="status_pengajuan" class="form-control" placeholder="pemohon" value="{{ $pemohon->status_pengajuan }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keterangan</strong>
                    <input type="text" name="keterangan" class="form-control" placeholder="pemohon" value="{{ $pemohon->keterangan }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary"> Ubah</button>
            </div>
        </div>
    </form>
</div>
@endsection