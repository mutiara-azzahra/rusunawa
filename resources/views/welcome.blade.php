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
    
    <link rel="shortcut icon" href="{{ asset('logo.png')}}">

    <!--CSS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Sistem Informasi Rumah Susun Kota (SIRSAK) Banjarmasin</title>
  </head>

  <body>
  <header id="header" class="header">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
          <img src="{{ asset('logo-dinasperkin.png') }}" alt="" class="img-fluid img-logo-navbar">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" style="padding-right: 30px;" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#tentang">Tentang <span class="sr-only">(current)</span></a>
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
                @foreach($info_rusun as $i)
                <a class="dropdown-item" href="{{ route('latar-belakang',$i->id_info_rusun)}}">Rusun {{$i->rusun->nama_rusun}}</a>
                @endforeach
              </div>
            </li>
            @if (Auth::check())
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ Route('beranda') }}">Profil Saya</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href ="{{ route('logout') }}">Keluar
                    <i class="nav-icon fas fa-sign-out-alt" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Keluar"></i>
                    {{-- <form id="frm-logout" action="{{ route('logout') }}" method="post" style="display: none;">
                      @csrf
                    </form>--}}
                  </a>
                </div>
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link dropdown" href="{{ route('loginPage')}}">Masuk</a>
              </li> 
            @endif
          </ul>
        </div>
      </nav>
  </header>

<div class="container" data-aos="fade-right">
  <div class="pt-3 pb-5">
    <div class="row">
      <div class="col-lg-6 col-sm-7 text-left">
        <h1>Selamat Datang di Sistem Informasi Rusunawa</h1>
        <h3>Kota Banjarmasin (SIRSAK)</h3><br>
        <p>Bantuan Pembangunan Rumah Susun adalah tindak lanjut Program 1 juta rumah dari Kementerian PUPR dalam rangka pemenuhan kebutuhan rumah yang layak huni dan terjangkau bagi MBR (Masyarakat Berpenghasilan Rendah).</p>
        <a type="button" href="{{ route('loginPage')}}" class="btn btn-primary btn-lg">Daftar Sekarang</a>  
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

<div class="container justify-content-center" style="margin-top: 100px;">
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
  <div class="jumbotron-rusunawa" id="tentang" style="padding-top: 50px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-12" >
          <div class="text-left">
              <h3 data-aos="zoom-in-up"><b>Tentang Rusunawa Kota Banjarmasin</b></h3>
              <div class="underline-title mr-auto" data-aos="zoom-in-up"></div>
              <p data-aos="zoom-in-up" class="text-justify pt-3">Rumah Susun Sewa (Rusunawa) merupakan perumahahan yang dibangun oleh <b>UPT Pelayanan Rusunawa Kota Banjarmasin</b> 
                yang disewakan untuk masyarakat 
                khususnya kota Banjarmasin dengan harga yang terjangkau, lingkungan yang bersih dan aman.
                Ada tiga (2) buah rusun yang dapat ditempati di kota Banjarmasin yaitu 
                <span style="font: bold, italic; color: red">Teluk Kelayan dan Ganda Maghfirah</span></p>
            </div>             
          </div>

        <div class="col-lg-5 col-md-12">
          <div class="card" style="border-radius:  30px !important;">
            <div class="beranda-syarat text-left">
            <h4 class="beranda-syarat-judul">Syarat Mendaftar</h4>
            @foreach ($syarat_mendaftar as $s)
            <ul class="beranda-syarat">
              <li class="beranda-syarat-list"><i class="fas fa-check-circle" style="padding-right: 5px; color: green;"></i>{{ $s->syarat_mendaftar}}</li>           
            </ul>
            @endforeach
            </div>
          </div>
          
        </div>    
      </div>
    </div>  
  </div> 
</div>

<!--Rusun-->
<div class="jumbotron-lokasi" id="lokasi" style="padding-top: 100px;">
  <h3 data-aos="zoom-in-up"><b>Pilih Rusunawa</b></h3>
    <div class="underline-title mx-auto" data-aos="zoom-in-up"></div>
      <div class="container">
      
        <div class="row">
          @foreach($rusun as $r)
          <div class="card card-pilih-rusun" style="width: 20rem;">
            <div class="foto p-0">
              <img class="" src="{{asset('/storage/rusun/'.$r->foto)}}" data-id="{{asset('/storage/rusun/'.$r->foto)}}" alt="" width="100%" height="200px;">
            </div>
            <div class="detail pt-3 pb-3 pl-3 text-left">
              <h5>Rusunawa {{ $r->nama_rusun }}</h5>
              {{ $r->alamat }}, Banjarmasin<br>
              {{-- {{ $gedung->where('id_rusun','6')->count() }} Gedung<br> --}}
              {{ $r->gedung->count() }} Gedung<br>
              {{-- <p>@if($r->rusun != null){{$r->nama_rusun}} @else 0 @endif Gedung</p> --}}
              <div class="pt-1"><a href="{{ route('detailrusun',$r->id_rusun)}}" class="btn btn-primary">PILIH RUSUN</a></div>
            </div>
          </div>
          @endforeach          
        </div>
      </div>
</div>

{{-- <!--Lokasi-->
<div class="jumbotron-lokasi" id="lokasi" style="padding-top: 100px;">
  <h3 data-aos="zoom-in-up"><b>Lokasi Gedung Rusunawa</b></h3>
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
</div> --}}

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

<footer style="background-color: #ffc168; margin:0px !important;">
  <div class=" container container-fluid">
    <div class="row mb-3 pt-3">
      <div class="col-lg-2 text-center pt-2 pb-2">
        <img class="logo-footer" src="{{ asset('logo.png') }}" style="width: 100px">
      </div>
      <div class="col-lg-7 text-left ">
        <div class="text footer-bawah"><h4><b>UPT Rusunawa Kota Banjarmasin</b></h4>
        </div>
        <div class="text footer-bawah">
          <h5><b>Rusunawa Teluk Kelayan</b></h5>
          <p>Jl. Tembus Mantuil, Kelayan Selatan, Kecamatan Banjarmasin 
          Selatan, Kota Banjarmasin, Kalimantan Selatan 70233</p>
        </div>
        <div class="text footer-bawah">
            {{-- <div class="col-1">
              <i class="fas fa-clock"></i>
            </div> --}}
            <div class="col-11" style="padding: 0 !important">
              <b>Jam Operasional:</b></h5><br>
              <p class="font-weight-light">Senin - Minggu<br>
                Pukul 08.00 - 20.00 WITA</p>
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