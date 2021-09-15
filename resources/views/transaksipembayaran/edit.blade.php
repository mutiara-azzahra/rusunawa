@extends('layouts.admin')

@section('content')

<div class="container" style="padding: 20px; padding-bottom: 30px;"></
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Ubah Transaksi Pembayaran</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('transaksipembayaran.index') }}"> Kembali</a>
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
 
    <form action="{{ route('transaksipembayaran.update',$transaksi_pembayaran->id_transaksi_pembayaran) }}" method="POST">
        @csrf
        @method('PUT')
 
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Pembayar</strong>
                <select name="id_pemohon" class="form-control" >
                    <option value="">---Pilih Nama--</option>
                    @foreach($pemohon as $p)
                    <option value=" {{ $p->id_pemohon }}"> {{ $p->nama_kepala_keluarga }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Penerima</strong>
                <input type="text" name="id_admin" class="form-control" placeholder="" value= "{{ $transaksi_pembayaran->id_admin }}">  
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nominal Pembayaran</strong>
                <input type="text" name="nominal_pembayaran" class="form-control" placeholder="" value= "{{ $transaksi_pembayaran->nominal_pembayaran }}">  
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Bayar</strong>
                <input type="date" name="tanggal_bayar" class="form-control" placeholder="" value= "{{ $transaksi_pembayaran->tanggal_bayar }}">  
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary"> Ubah</button>
        </div>
    </div>
 
    </form>
@endsection