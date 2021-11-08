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

    <title>Rusunawa Teluk Kelayan | Sistem Informasi Rumah Susun Kota (SIRSAK) Banjarmasin</title>
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
            <li class="nav-item">
              <a class="nav-link" href="{{ route('Beranda') }}">Halaman Awal</a>
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
  
  <div class="jumbotron-lokasi">
        <!--Latar Belakang-->
        <div class="container latar-belakang text-justify">
          <div class="col-lg-12 col-md-12">
            <div class="row">
              <div class="col-lg-2 col-md-12 col-sm-12 logo-img-fluid1">
                  <img class="img-fluid1" src="{{asset('latarbelakang.png')}}" alt="">
              </div>
              <div class="col-lg-10 col-md-12">
                  <div class="judul-latar-belakang">
                    <h2 style="color: #853500; "><strong>Latar Belakang Pembangunan Rusunawa</strong></h2><br></div>
                  </div>
              </div>
            </div>  
            <div class="col-lg-12 col-md-12 content-latar-belakang">
                <ol>
                    <li>{!! $info_rusun->latar_belakang !!}</li><br>
                </ol>
            </div>
          </div>
        </div>

        <!--Tipologi Bangunan-->
        <div class="container latar-belakang text-justify">
          <div class="col-lg-12 col-md-12">
            <div class="row">
              <div class="col-lg-2 col-md-12 col-sm-12 logo-img-fluid1">
                  <img class="img-fluid1" src="{{asset('topologi.png')}}" alt="">
              </div>
              <div class="col-lg-10 col-md-12">
                  <div class="judul-latar-belakang">
                    <h2 style="color: #853500;"><strong>Tipologi Bangunan Rusunawa</strong></h2><br></div>
                  </div>
              </div>
            </div>  
            <div class="col-lg-12 col-md-12 content-latar-belakang">
                <ol>
                    <li>{!! $info_rusun->tipologi_bangunan !!}</li><br>
                </ol>
            </div>
          </div>
        </div>

        <!--Sumber Dana-->
        <div class="container latar-belakang text-justify">
          <div class="col-lg-12 col-md-12">
            <div class="row">
              <div class="col-lg-2 col-md-12 col-sm-12 logo-img-fluid1">
                  <img class="img-fluid1" src="{{asset('pendanaan.png')}}" alt="">
              </div>
              <div class="col-lg-10 col-md-12">
                  <div class="judul-latar-belakang">
                    <h2 style="color: #853500;"><strong>Sumber Dana Pembangunan Rusunawa</strong></h2><br></div>
                  </div>
              </div>
            </div>  
            <div class="col-lg-12 col-md-12 content-latar-belakang">
                <ol>
                    <li>{!! $info_rusun->sumber_dana !!}</li><br>
                </ol>
            </div>
          </div>
        </div>

        <!--Persyaratan Huni-->
        <div class="container latar-belakang text-justify">
          <div class="col-lg-12 col-md-12">
            <div class="row">
              <div class="col-lg-2 col-md-12 col-sm-12 logo-img-fluid1">
                  <img class="img-fluid1" src="{{asset('persyaratan.png')}}" alt="">
              </div>
              <div class="col-lg-10 col-md-12">
                  <div class="judul-latar-belakang">
                    <h2 style="color: #853500;"><strong>Persyaratan Huni Rusunawa</strong></h2><br></div>
                  </div>
              </div>
            </div>  
            <div class="col-lg-12 col-md-12 content-latar-belakang">
                <ol>
                    <li>{!! $info_rusun->persyaratan_huni !!}</li><br>
                </ol>
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

  </body>
</html>