@extends('layouts.admin')
@section('content')

@if(Auth::user()->id_role == 2)
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Halaman User</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Beranda</a></li>
          <li class="breadcrumb-item active">User</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card" style="padding:30px;">
        <div class="col-lg-12 col-md-6 col-sm-6 pb-3">
          <h4>Selamat Datang, {{ Auth::user()->nama_user}}!</h4>
        </div>
          <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12">
              <img src="{{ asset('user-welcome.jpg')}}" alt="" class="w-100">
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-7 col-md-12 col-sm-12 p-1">
              <div class="card p-2">
                <div><strong>Status Permohonan</strong></div>
                @if($pemohon->status_pengajuan == 'diverifikasi')
                <div><h4><span class="badge badge-success">Diverifikasi</span></h4></div>

                @elseif($pemohon->status_pengajuan =='diproses')
                <div><h4><span class="badge badge-warning">Diproses</span></h4></div>

                @if($pemohon->id_ruangan == null)
                <div><a class="btn btn-success btn-sm mt-3" href="{{ Route('pemohon.pilihgedung') }}"> Pilih Gedung</a></div>
                @else
                @endif

                @elseif($pemohon->status_pengajuan =='ditolak')
                <div><h4><span class="badge badge-danger">Ditolak</span></h4></div>

                @elseif($pemohon->status_pengajuan =='belum lengkap')
                <div><h4><span class="badge badge-info">Belum Lengkap</span></h4></div>
                <div><a class="btn btn-success btn-sm" href="{{ Route('pemohon_user.create') }}"> Lengkapi Dokumen</a></div>



                @endif
                
                
              </div>
              <div class="card p-2">
                <div class=""><strong>Status Pembayaran</strong></div>
                Bulan {{ $month = Carbon\carbon::now()->translatedFormat('F'); }} <div><h4>
                  @if ($detail)
                      
                  <span class="badge badge-success">Sudah Dibayar</span>
                  @else
                  <span class="badge badge-danger">Belum Dibayar</span>
                      
                  @endif
                  
                </h4></div>
                <div class="" style="color: red">Jatuh Tempo: Setiap tanggal 10</div>
              </div>
            </div>        
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endif
@endsection