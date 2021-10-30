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

    <title>Rusunawa Teluk Kelayan | Sistem Informasi Rusunawa Kota Banjarmasin</title>
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
      
        <div class="collapse navbar-collapse" style="margin-right: 30px;" id="navbarSupportedContent">
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
              {{-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('latar-belakang')}}">Rusun Teluk Kelayan</a>
                <a class="dropdown-item" href="#">Rusun Ganda Maghfirah</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Persyaratan dan Tata Tertib</a>
                <a class="dropdown-item" href="#">Kelengkapan Berkas</a>
              </div> --}}
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
  
  <div class="jumbotron-lokasi" style="padding-top: 100px;">
        <!--Latar Belakang-->
        
        <div class="container text-justify">
          <div class="row">
          <div class="col-lg-12 col-md-12">
              <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                      <img class="img-fluid img-tanya-jawab" src="{{asset('tanya.jpg')}}" alt="">
                  </div>
                  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                      <div class="float-left">
                        <h2 class="pt-5" style="color: #853500; "><strong>Latar Belakang Pembangunan Rusunawa</strong></h2><br></div>
                      </div>
                  </div>
              </div>
              
            <div class="col-lg-12 col-md-12 pb-4 p-5">
                <ol>
                    <li>{!! $info_rusun->latar_belakang !!}</li><br>
                </ol>
            </div>
          </div>
        </div>


        <!--Sumber Dana-->
        <div class="container text-justify">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-1 col-sm-5 col-xs-5">
                            <img class="img-fluid" src="{{asset('tanya.jpg')}}" style="width: 100%;" alt="">
                        </div>
                        <div class="col-lg-9 col-md-11 col-sm-7 col-xs-7">
                            <div class="float-left">
                            <h2 class="pt-5" style="color: #853500; "><strong>Sumber Dana</strong></h2><br></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 col-md-12 pb-4 p-5">
                        {!! $info_rusun->sumber_dana !!}<br>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Persyaratam Huni-->
        <div class="container text-justify">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-5 col-sm-5 col-xs-5">
                            <img class="img-fluid1" src="{{asset('tanya.jpg')}}" style="width: 100%;" alt="">
                        </div>
                        <div class="col-lg-9 col-md-7 col-sm-7 col-xs-7">
                            <div class="float-left">
                            <h2 class="pt-5" style="color: #853500; "><strong>Persyaratan Penghunian Rumah Susun</strong></h2><br></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 col-md-12 pb-4 p-5">
                        <ol>
                            {!! $info_rusun->persyaratan_huni !!}
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!--Tata Tertib-->
        <div class="container text-justify">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-5 col-sm-5 col-xs-5">
                            <img class="img-fluid" src="{{asset('tanya.jpg')}}" style="width: 100%;" alt="">
                        </div>
                        <div class="col-lg-9 col-md-7 col-sm-7 col-xs-7">
                            <div class="float-left">
                            <h2 class="pt-5" style="color: #853500; "><strong>Tata Tertib Hunian Rumah Susun</strong></h2><br></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 col-md-12 pb-4 p-5">
                        <ol>
                           {!! $info_rusun->tata_tertib !!}
                        </ol>
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

  </body>
</html>