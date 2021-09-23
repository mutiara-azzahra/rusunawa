@extends('layouts.admin')

@section('content')

<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Detail Transaksi Pembayaran</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success btn-secondary" href=c><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>

    <div class="card" style="padding:30px;">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gedung</strong><br>
                    {{ $transaksi_pembayaran->ruangan->lantai->gedung->nama_gedung }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ruangan</strong><br>
                    No. {{ $transaksi_pembayaran->ruangan->no_ruangan }}
                </div>
            </div> 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total Pembayaran</strong><br>
                    Rp. {{$detail_transaksi_pembayaran->sum('harga')}} ,-
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Pembayaran</strong><br>
                    {{ Carbon\carbon::parse($transaksi_pembayaran->created_at)->format('d F Y') }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Penerima</strong><br>
                    {{ $transaksi_pembayaran->user->nama_user}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pembayar</strong><br>
                    {{ $transaksi_pembayaran->pemohon->nama_kepala_keluarga }}
                </div>
            </div>
        </div>    
    </div>

    <div class="card" style="padding:30px;">
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-8">
                <h5>
                  Detail Transaksi Pembayaran
                </h5>
              </div>
              <div class="col-4">
                <small class="">Tanggal Pembayaran : {{ Carbon\carbon::parse($transaksi_pembayaran->created_at)->format('d F Y') }}</small>
              </div>

              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                <strong>Pembayar : </strong>
                <address>
                {{ $transaksi_pembayaran->pemohon->nama_kepala_keluarga}}<br>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <strong>Penerima : </strong>
                <address>
                  {{ $transaksi_pembayaran->user->nama_user}}<br>
                  Ruangan : {{ $transaksi_pembayaran->pemohon->ruangan->no_ruangan }}<br>
                  Gedung : {{ $transaksi_pembayaran->pemohon->ruangan->lantai->gedung->nama_gedung }} <br>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <b>ID Transaksi : {{ $transaksi_pembayaran->id_transaksi_pembayaran }}</b> <br>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped table-bordered">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Harga</th>
                  </tr>
                  </thead>
                  <tbody>
                
                    @php
                    $no=1;
                    @endphp
                  @foreach ($detail_transaksi_pembayaran as $d)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $d->bulan }}</td>
                    <td>Rp. {{ $d->harga }} ,-</td>
                  </tr>
                  @endforeach
                  <tr>
                      <td colspan="2">Total Harga</td>
                      <td><b>Rp. {{$detail_transaksi_pembayaran->sum('harga')}} ,-</b></td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-6">
                <p class="lead"></p>

              </div>
              <!-- /.col -->
            </div>
          </div>
          <!-- /.invoice -->   
    </div>

</div>

@endsection