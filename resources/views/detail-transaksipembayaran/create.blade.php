@extends('layouts.admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('content')

<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h3>Tambah Detail Transaksi Pembayaran</h3>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('detail-transaksipembayaran.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
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

    <div class="card" style="padding: 30px;">
        <form action="{{ route('detail-transaksipembayaran.store') }}" method="POST">
            @csrf
        
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                            <label>Ruangan</label>
                            <select name="id_ruangan" class="form-control select2bs4 p-1" style="width: 100%;" onchange="getPemohon()" id="id_ruangan">
                            <option >-- Pilih Ruangan --</option>
                            @foreach($ruangan as $r)
                            <option value="{{ $r->id_ruangan }}"> {{ $r->no_ruangan }} - {{$r->lantai->lantai}} - {{ $r->lantai->gedung->nama_gedung }} </option>
                            @endforeach
                            </select>
                    </div>
                </div>
                @csrf

                <div class="col">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <strong>Nama Penghuni</strong>
                                <input readonly type="text" name="id_pemohon" id="nama_kepala_keluarga" class="form-control" placeholder="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
         
            <div class="card" style="padding: 30px;">
                <div class="col pb-4">
                    <h4>Pembayaran</h4>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Bulan</strong>
                        <input type="month" name="bulan" id="harga" class="form-control" placeholder="">
                    </div>
                </div>
        
                <div class="col">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <strong>Harga</strong><br>
                                <input id="" name="harga" type="text" lang="id-ID" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <strong>Tahun</strong><br>
                                <input id="" name="tahun" type="date" lang="id-ID" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <strong>Harga</strong>
                                <input name="harga" id="" type="text" name="total_bayar" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <strong>Status Detail Ruangan</strong>
                                <input type="text" name="status_detail_ruangan" class="form-control" placeholder="" value="{{ Auth::user()->nama_user}}" readonly>
                            </div>
                        </div>
                    </div>                    
                </div>

                <div class="col">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                        <div class="float-right">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>  Simpan Data</button>
                        </div>
                    </div>                    
                </div>

            </div>
        </form>    
    </div>
</div>


@endsection

