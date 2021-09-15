@extends('layouts.admin')
@section('content')
@if(Auth::user()->id_role == 1)
  <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Halaman Admin</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item active">Admin</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>15</h3>

                <p>Permohonan Sewa Baru</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <div class="col">
                  <h3>7</h3>
                </div>
                <p>Permohonan Sedang Diverifikasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <div class="col">
                  <h3>20</h3>
                </div>
                <p>Registrasi User Baru</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <div class="col">
                  <h3>65</h3>
                </div>
                <p>Penghuni Rusunawa</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@else(Auth::user()->id_role == 2)
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

        <div class="col-lg-12 col-md-6 col-sm-6">
          <h4>Selamat Datang, {{ Auth::user()->nama_user}}!</h4>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-12 col-sm-12">
            <img src="{{ asset('user-welcome.jpg')}}" alt="" class="w-100">
          </div>


          <div class="col-lg-4 col-md-12 col-sm-12 p-1">
            <div class="card p-2">
              <div> Status Permohonan Sewa</div>
              @if($pemohon->status_pengajuan == 'diverifikasi')
              <div><h4><span class="badge badge-success">Diverifikasi</span></h4></div>

              @elseif($pemohon->status_pengajuan =='diproses')
              <div><h4><span class="badge badge-warning">Diproses</span></h4></div>

              @elseif($pemohon->status_pengajuan =='ditolak')
              <div><h4><span class="badge badge-danger">Ditolak</span></h4></div>

              @elseif($pemohon->status_pengajuan =='belum lengkap')
              <div><h4><span class="badge badge-info">Belum Lengkap</span></h4></div>
              <div><a class="btn btn-success btn-sm" href="{{ Route('pemohon_user.create') }}"> Lengkapi Dokumen</a></div>
              
              @endif
              
              
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12 p-1">
            <div class="card p-2">
              Tagihan Bayar
            </div>
          </div>        
        </div>

        <!-- ./col -->



      <div class="col">
        
      </div>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endif
      <!-- /.content -->
@endsection

@section('script')
    <script>

    </script>
@endsection