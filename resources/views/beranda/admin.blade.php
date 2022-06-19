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
          <div class="col">

            <h5 class="mt-4 mb-2"></h5>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header d-flex p-0">
                    <h3 class="card-title p-3">Rekap Pendapatan dan Penghuni</h3>
                      <ul class="nav nav-pills ml-auto p-2">
                        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Penghuni</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Pendapatan</a></li>
                      </ul>
                    </div>
                  <div class="card-body">
                  <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="row">
                      <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                          <div class="inner">
                            <div class="col">
                              <div class="row">
                                <h3> {{ $pemohon_diproses }} </h3><h6> orang</h6>
                              </div>
                            </div>
                              Pemohon Belum Diverifikasi
                          </div>
                          <div class="icon">
                            <i class="ion ion-bag"></i>
                          </div>
                          <a href="{{ Route('pemohon.index') }}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                          <div class="inner">
                            <div class="col">
                              <div class="row">
                                <h3> {{ $pemohon_aktif }} </h3><h6> orang</h6>
                              </div>
                            </div>
                            Total Pemohon Aktif
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                          <div class="inner">
                            <div class="col">
                              <div class="row">
                                <h3>{{ $tunggakan }}</h3><h6> orang</h6>
                              </div>
                            </div>
                            Tunggakan Bulan {{ $bulan_ini }}
                          </div>
                          <div class="icon">
                            <i class="ion ion-person-add"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                    <div class="tab-pane" id="tab_2">
                      <!-- ./col -->
                      <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-secondary">
                          <div class="inner">
                            <div class="col">
                              <h3>Rp. {{ $detail_transaksi_pembayaran }}</h3>
                            </div>
                            Total Pendapatan Bulan {{ $bulan_ini }}
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
                </div>
              </div>
          </div>
        </div>

        <div class="col">

            <!--Pie Chart-->
          <div class="col-lg-6">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Total Ruangan Terisi/Kosong/Rusak</h3>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>

          </div>
          <!-- /.col (LEFT) -->  
            <!-- <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <div class="col">
                    <div class="row">
                      <h3>{{ $ruangan_kosong }}</h3><h6> ruangan</h6>
                    </div>
                  </div>
                  Jumlah Ruangan Kosong
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-primary">
                <div class="inner">
                  <div class="col">
                    <div class="row">
                      <h3>{{ $ruangan_terisi }}</h3><h6> ruangan</h6>
                    </div>
                  </div>
                  Jumlah Ruangan Terisi
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div> -->
          </div>

                 
        </div>

        <!-- Grafik Ruangan Kosong Per Rusun-->
        <div class="col">
          <div class="card">
            <div>
              <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div>
              <canvas id="chartPemasukan"></canvas>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

{{-- @elseif(Auth::user()->id_role == 2)

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
                Bulan {{ $month = Carbon::now()->translatedFormat('F'); }} <div><h4>
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
</section> --}}
@endif
@endsection

@section('script')
<script>
    var donutChartCanvas = $('#pieChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Ruangan Terisi',
          'Ruangan Kosong',
      ],
      datasets: [
        {
          data: [{!! $ruangan_terisi !!},{!! $ruangan_kosong !!}],
          backgroundColor : ['#f56954', '#00a65a'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
</script>

<script>

  const data = {
    labels: {!! $LabelchartGedung !!},
    datasets: [{
      label: 'Ruangan Kosong',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data:{!! $ValuechartGedung !!},
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {}
  };

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>


<script>

const data2 = {
    labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
    datasets: [{
      label: 'PEMASUKAN',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data:{!! $pemasukan !!},
    }]
  };

  const config2 = {
    type: 'bar',
    data: data2,
    options: {}
  };

  const myChart2 = new Chart(
    document.getElementById('chartPemasukan'),
    config2
  );
</script>
@endsection