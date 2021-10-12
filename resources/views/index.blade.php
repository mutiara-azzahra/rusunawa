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
        <div class="col">
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

          <!--Pie Chart-->
          <div class="col-lg-6">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Pie Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>

          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Donut Chart</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.col (LEFT) -->         
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

              @elseif($pemohon->status_pengajuan =='ditolak')
              <div><h4><span class="badge badge-danger">Ditolak</span></h4></div>

              @elseif($pemohon->status_pengajuan =='belum lengkap')
              <div><h4><span class="badge badge-info">Belum Lengkap</span></h4></div>
              <div><a class="btn btn-success btn-sm" href="{{ Route('pemohon_user.create') }}"> Lengkapi Dokumen</a></div>
              
              @endif
              
              
            </div>
            <div class="card p-2">
              <div class=""><strong>Status Pembayaran</strong></div>
              Bulan Oktober 2021 <div><h4>
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

      //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

      //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })
    </script>
@endsection