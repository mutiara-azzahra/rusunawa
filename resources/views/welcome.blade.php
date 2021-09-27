<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('style.css')}}">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin-template/plugins/fontawesome-free/css/all.min.css') }}">
    
    <!-- Second Font-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!--CSS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Beranda | Sistem Informasi Rusunawa Kota Banjarmasin</title>
  </head>

  <body>
    <!--Navbar-->
  <header id="header" class="header">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('logo.png') }}" alt="" class="img-fluid" style="height: 50px; width: 50px;">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link" href="#tentang">Tentang Rusunawa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#lokasi">Lokasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#alur">Alur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('tanya-jawab')}}">Tanya Jawab</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Layanan Informasi
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Persyaratan</a>
              <a class="dropdown-item" href="#">Permohonan</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Kelengkapan Berkas</a>
            </div>
          </li>
          @if (Auth::check())
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Menu
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ Route('AdminBeranda') }}">Profil Saya</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href ="{{ route('logout') }}">Keluar
                  <i class="nav-icon fas fa-sign-out-alt" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Keluar"></i>
                  {{-- <form id="frm-logout" action="{{ route('logout') }}" method="post" style="display: none;">
                    @csrf
                  </form> --}}
                </a>
              </div>
            </li>
            <li class="nav-item" style="padding-top:7px;">
              
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link dropdown" href="{{ route('loginPage')}}">Masuk</a>
            </li>
          @endif
        </ul>
      </div>
    </div>
    </nav>
</header>

<div class="container" data-aos="fade-right">
  <div style="padding-top: 100px; padding-bottom: 50px;">
    <div class="row">
      <div class="col-lg-6 col-sm-7 text-left">
        <h1>Selamat Datang di Sistem Informasi Rusunawa</h1>
        <h3>Kota Banjarmasin</h3><br>
        <p>Rumah Susun Sewa kota Banjarmasin, hunian dengan harga terjangkau, persyaratan mudah, fasilitas lengkap, siap huni.</p>
        <button type="button" href="#" class="btn btn-primary btn-lg">Daftar Sekarang</button>  
      </div>
      <div class="col-lg-6 order-sm-2">
        <div>
          <img class="img-fluid" src="{{asset('building.jpg')}}" style="width: 100%;" alt="">
        </div>
      </div>
    </div>    
  </div>
</div>

<!-- Pendaftaran Rusunawa -->
<div style="background-color: #F58735;">
  <div class="container text-left">
    <div style="padding-left: 10px; padding-right: 10px;">
      <div class="col" style="color: white;">
        <h2>Pendaftaran Rusunawa</h2>
      </div>
      <div class="col" style="color: #dcdddc;">
        <h5>Pendaftaran untuk seluruh warga Kalimantan Selatan</h5>
      </div>
    </div>
  </div>
</div>

<div class="container justify-content-center">
  <h3 data-aos="zoom-in-up"><b>Informasi Pada Aplikasi Rusunawa</b></h3>
<div class="underline-title mx-auto" data-aos="zoom-in-up"></div>

<div class="container">
  <div class="row">
    <div class="col-md">
      <div class="card shadow p-3 mb-5 bg-white rounded" style=" height: 300px;">
        <img class="card-img-top" src="{{ asset('loupe.png') }}"  style="width: 50px;">
        <div class="card-body">
          <h5 class="card-title">KETERSEDIAAN RUSUNAWA</h5>
          <p class="card-text">Berisi informasi mengenai ketersediaan rusun 
            yang dapat ditempati beserta biaya, lama
            penyewaan,  alamat, serta tipe ruangan.</p>   
        </div>
      </div>
    </div>
    <div class="col-md">
        <div class="card shadow p-3 mb-5 bg-white rounded"  style=" height: 300px;">
          <img class="card-img-top" src="{{ asset('information.png') }}" style="width: 50px;">
          <div class="card-body">
            <h5 class="card-title">INFORMASI PERMOHONAN</h5>
            <p class="card-text">Halaman ini dapat
              memberikan anda informasi alur sebelum mengajukan
              penempatan rusun.</p>  
          </div>
        </div>
    </div>
    <div class="col-md">
      <div class="card shadow p-3 mb-5 bg-white rounded" style=" height: 300px;">
        <img class="card-img-top" src="{{ asset('group.png') }}" style="width: 50px; ">
        <div class="card-body">
          <h5 class="card-title">BUAT AKUN PENGAJUAN</h5>
          <p class="card-text">Register akun untuk dapat melanjutkan
          pengajuan penempatan rusun.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Tentang Rusunawa Kota Banjarmasin-->
<div class="container">
  <div class="jumbotron-rusunawa" id="tentang" style="padding-top: 100px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12" style="padding-right:100px;" >
          <div class="text-left">
              <h3 data-aos="zoom-in-up"><b>Tentang Rusunawa Kota Banjarmasin</b></h3>
              <div class="underline-title mr-auto" data-aos="zoom-in-up"></div>
              <p><h5 style="line-height:30px;">Rumah Susun Sewa (Rusunawa) merupakan perumahahan yang dibangun oleh <b>UPT Pelayanan Rusunawa Kota Banjarmasin</b> 
                yang disewakan untuk masyarakat 
                khususnya kota Banjarmasin dengan harga yang terjangkau, lingkungan yang bersih dan aman.
                Ada tiga (3) buah rusun yang dapat ditempati di kota Banjarmasin yaitu di daerah 
                <span style="font: bold, italic; color: red">Basirih,
                Mantuil dan Teluk Kelayan</span></h5></p>
            </div>             
          </div>

        <div class="col-lg-6 col-md-12">
          <div class="beranda-syarat text-left">
            <h4 class="beranda-syarat-judul">Syarat Mendaftar</h4>
            <ul class="beranda-syarat">
              <li class="beranda-syarat-list">Lorem ipsum</li>
              <li class="beranda-syarat-list">Lorem ipsum</li>
              <li class="beranda-syarat-list">Lorem ipsum</li>
              <li class="beranda-syarat-list">Lorem ipsum</li>
              <li class="beranda-syarat-list">Lorem ipsum</li>
            </ul>
            
          </div>
        </div>    
      </div>
    </div>  
  </div> 
</div>

<!--Lokasi-->
<div class="jumbotron-lokasi" id="lokasi" style="padding-top: 100px;">
  <h3 data-aos="zoom-in-up"><b>Lokasi Rusunawa</b></h3>
    <div class="underline-title mx-auto" data-aos="zoom-in-up"></div>
      <div class="container">
      
        <div class="row">
        @foreach($gedung as $g)
        <div class="col-md-3">
          <div class="card" style="width: 15rem; margin-bottom: 30px;">
            <img src="{{ asset('rusunawa3.jpg') }}" class="card-img-top" style="height: 250px;">
              <div class="card-body">
                <h5 class="card-title" style="height: 50px;"><b>{{$g->nama_gedung}}</b></h5>
                  <p class="card-text">@if($g->ruangan != null){{$g->ruangan->count()}} @else 0 @endif Ruangan</p>
                    <a href="{{ route('detailgedung',$g->id_gedung)}}" class="btn btn-primary">PESAN SEKARANG</a>
              </div>
          </div>
        </div>
          @endforeach          
        </div>

      </div>
</div>

<!-- Alur-->
<div class="jumbotron-lokasi" id="alur" style="padding-top: 50px;">
  <h3 data-aos="zoom-in-up"><b>Alur Permohonan</b></h3>
  <div class="underline-title mx-auto" data-aos="zoom-in-up"></div>
      <div class="container">
          <div class="row content pb-5">
            <div class="col-md-5 col-sm-12">
              <img class="" src="{{ asset('masuk.jpg') }}" alt="" class="img-fluid" style="width: 40%;">
            </div>
            <div class="col-md-7 pt-5 order-2 order-md-1 text-justify">
              <h3>1. Masuk Ke Website Aplikasi Rusunawa</h3>
              <p style="font-size: 15px;">
                  Klik tombol <span style="font: bold; color: red">Login</span> untuk masuk kedalam akun anda.
              </p>
            </div>
          </div>
          <div class="row content pb-5">
            <div class="col-md-5 order-1 order-md-2">
              <img class="" src="{{ asset('form.jpg') }}" alt="" class="img-fluid" style="width: 50%;">
            </div>
            <div class="col-md-7 pt-5 order-2 order-md-1 text-right">
              <h3>2. Registrasi Akun Rusunawa</h3>
              <P style="font-size: 15px;">
                Apabila anda belum memiliki akun, <span style="font: bold; color: red">Registrasi</span> akun anda terlebih dahulu.
              </P>
            </div>
          </div>
          <div class="row content pb-5">
            <div class="col-md-5">
              <img class="" src="{{ asset('berkas.jpg') }}" alt="" class="img-fluid" style="width: 50%;">
            </div>
            <div class="col-md-7 pt-5 order-2 order-md-1 text-left">
              <h3>3. Daftarkan Permohonan Anda</h3>
              <P style="font-size: 15px;">
                  Daftarkan permohonan sewa rusun anda dan sertakan dokumen sesuai yang diperlukan.
              </P>
            </div>
          </div>
          <div class="row content pb-5">
              <div class="col-md-5 order-1 order-md-2">
                <img class="" src="{{ asset('wawancara.jpg') }}" alt="" class="img-fluid" style="width: 50%;">
              </div>
              <div class="col-md-7 pt-5 order-2 order-md-1 text-right">
                <h3>4. Wawancara dengan Verifikator</h3>
                <P style="font-size: 15px;">
                  Selanjutnya akan dihubungi melalui kontak anda untuk melakukan<br>
                  wawancara dengan membawa dokumen fisik yang diperlukan.<br>
                </P>
              </div>          
          </div>
          <div class="row content">
            <div class="col-md-5">
              <img class="" src="{{ asset('gedung.jpg') }}" alt="" class="img-fluid" style="width: 50%;">
            </div>
            <div class="col-md-7 pt-5 order-2 order-md-1 text-left">
              <h3>5. Permohonan Diterima</h3>
              <P style="font-size: 15px;">
                Anda dapat menempati rusunawa sesuai dengan hasil verifikasi dan wawancara.
              </P>
            </div>
          </div>  
      </div>
  </div>
</div>

<!-- Footer-->
{{-- <div class="jumbotron-lokasi" id="faq" style="padding-top: 100px;">
  <h3 data-aos="zoom-in-up"><b>Pertanyaan Seputar Rusunawa</b></h3>
    <div class="underline-title mx-auto" data-aos="zoom-in-up"></div>

      <div class="container text-justify">
        <div class="row">
          <div class="col-lg-12 col-md-12 pb-4">
            <div class="float-right">
              <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" style="width:20rem" type="search" placeholder="Cari pertanyaan disini.." aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-sidebar">
                      <i class="fas fa-search fa-fw"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>            
          </div>
          <div class="col">
                @foreach ($posts as $p)
                <div class="accordion" id="accordion">
                  <div class="card mb-2 card-outline">
                    <div class="card-header" id="heading">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $p->id }}" aria-expanded="true" aria-controls="collapse">
                          {{ $p->title }}
                        </button>
                      </h2>
                    </div>
                
                    <div id="collapse{{ $p->id }}" class="collapse border-2" aria-labelledby="heading" data-parent="#accordion">
                      <div class="card-body">
                        {{ $p->content}}
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                {!! $posts->links('pagination::bootstrap-4') !!}

            </div>
          </div>
        </div>
      </div>


</div> --}}

<footer style="background-color: #ffc168; margin:0px !important;">
  <div class=" container container-fluid">
    <div class="row mb-3 pt-3">
      <div class="col-lg-2 text-center pt-2 pb-2">
        <img class="logo-footer" src="{{ asset('logo.png') }}" style="width: 100px">
      </div>
      <div class="col-lg-7 text-left">
        <div class="text"><h4><b>UPT Rusunawa Kota Banjarmasin</b></h4>
        </div>
        <div class="text">
          <h5><b>Rusunawa Teluk Kelayan</b></h5>
          <p>Jl. Tembus Mantuil, Kelayan Selatan, Kecamatan Banjarmasin 
          Selatan, Kota Banjarmasin, Kalimantan Selatan 70233</p>
          <h5><b>Rusunawa Kelayan</b></h5>
        </div>
        <div class="text">
          <div class="row">
            <div class="col-1">
              <i class="fas fa-clock"></i>
            </div>
            <div class="col-11" style="padding: 0 !important">
              <b>Jam Operasional:</b></h5><br>
              <p class="font-weight-light">Senin - Minggu<br>
                Pukul 08.00 - 20.00 WITA</p>
            </div>
          </div>
          
        </div>
      </div>
      <div class="col-lg-3 col-sm-12">
        <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 200px">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7966.13248691012!2d114.58671917414155!3d-3.333811390292363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de42315cebe6133%3A0x771d4faf845a24e5!2sRusunawa%20Teluk%20Kelayan!5e0!3m2!1sid!2sid!4v1628680806932!5m2!1sid!2sid" frameborder="0"
            style="border:0" height="100%" width="100%" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
    <div class="col-lg-12 text-center" style="font-size: 15px;"><span>Developed by Dinas Komunikasi, Informasi dan Statistik</span> Kota Banjarmasin, 2021</div>
    </div>
  </div>
</footer> 

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
  $(document).ready(function(){
    $("a").on('click', function(event) {
  
      if (this.hash !== "") {
        event.preventDefault();
  
        var hash = this.hash;
  
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 500, function(){
     
          window.location.hash = hash;
        });
      }
    });
  });
  </script>

  <script>
    AOS.init();
  </script>
  </body>
</html>