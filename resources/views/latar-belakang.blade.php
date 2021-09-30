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

    <title>Rusunawa Teluk Kelayan | Sistem Informasi Rusunawa Kota Banjarmasin</title>
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
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('Beranda') }}">Halaman Awal</a>
          </li>
  
          @if (Auth::check())
  
          @else
          <li class="nav-item">
            <a class="nav-link dropdown" href="{{ route('loginPage')}}">Masuk</a>
          </li>
          @endif
  
          @if (Auth::check())
          <li class="nav-item" style="padding-top: 7px;">
            <a href ="{{ route('logout') }}" onClick="event.preventDefault(); document.getElementById('frm-logout').submit();">
              <i class="nav-icon fas fa-sign-out-alt" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Keluar"></i>
            </a>
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
          @else
  
          @endif
  
        </ul>
      </div>
      
    </div>
    </nav>
  </header>

  <div class="jumbotron-lokasi" style="padding-top: 100px;">
    <div class="container">
        <nav class="nav">
            <a class="nav-link active" id="latarbelakang" href="#">Latar Belakang</a>
            <a class="nav-link active" id="sumberdana" href="#">Sumber Dana</a>            
            <a class="nav-link active" id="syarathuni" href="#">Syarat Huni</a>            
            <a class="nav-link active" id="tatatertib" href="#">Tata Tertib</a>            
        </nav>
    </div>
    
  </div>
  <!-- Footer-->
  <div class="jumbotron-lokasi" id="latarbelakang">

        <!--Latar Belakang-->
        <div class="container text-justify">
          <div class="row">
          <div class="col-lg-12 col-md-12">
              <div class="row">
                  <div class="col-lg-2 col-md-5 col-sm-5 col-xs-5">
                      <img class="img-fluid" src="{{asset('tanya.jpg')}}" style="width: 100%;" alt="">
                  </div>
                  <div class="col-lg-9 col-md-7 col-sm-7 col-xs-7">
                      <div class="float-left">
                        <h2 class="pt-5" style="color: #853500; "><strong>Latar Belakang Pembangunan Rusunawa Teluk Kelayan Kota Banjarmasin</strong></h2><br></div>
                      </div>
                  </div>
                  
              </div>
              
            <div class="col-lg-12 col-md-12 pb-4 p-5">
                <ol>
                    <li>Rumah layak huni dan terjangkau bagi Masyarakat Berpenghasilan Rendah (MBR) merupakan 
                        permasalahan yang harus ditangani oleh Pemerintah Pusat dan Pemerintah Daerah.</li><br>
                    <li>Pada Undang-Undang Nomor 1 Tahun 2011 tentang Perumahan dan Kawasan Permukiman, Negara 
                        bertanggung jawab atas penyelenggaraan perumahan dan kawasan permukiman yang pembinaannya 
                        dilaksanakan oleh pemerintah sehingga setiap orang / keluarga / rumah tangga berhak menempati 
                        rumah layak huni.</li><br>
                    <li>Dalam rangka mendukung Visi-Misi Walikota Banjarmasin tahun 2016-2021 terutama Misi ketiga 
                        "Mewujudkan Kota Banjarmasin indah dengan penataan kota berbasis tata ruang berbasis sungai, 
                        guna terwujud kota yang asri dan harmoni" dimana salah satu sasaran strategisnya adalah 
                        pembenahan permukiman kumuh melalui penyediaan hunian yang layak bagi masyarakat Kota 
                        Banjarmasin.</li><br>
                </ol>
            </div>
          </div>
        </div>


        <!--Sumber Dana-->
        <div class="container text-justify">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-2 col-md-5 col-sm-5 col-xs-5">
                            <img class="img-fluid" src="{{asset('tanya.jpg')}}" style="width: 100%;" alt="">
                        </div>
                        <div class="col-lg-9 col-md-7 col-sm-7 col-xs-7">
                            <div class="float-left">
                            <h2 class="pt-5" style="color: #853500; "><strong>Sumber Dana</strong></h2><br></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 col-md-12 pb-4 p-5">
                        Pembangunan Rumah Susun Sewa Teluk Kelayan Bersumber Dari Dana APBN Tahun Anggaran 2018 
                        Yang Dilaksanakan Oleh Direktorat Rumah Susun, Direktorat Jenderal Penyediaan Perumahan Kementerian  
                        Pekerjaan Umum Dan Perumahan Rakyat Melalui Satuan Kerja Pengembangan Perumahan.<br>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Persyaratam Huni-->
        <div class="container text-justify">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-2 col-md-5 col-sm-5 col-xs-5">
                            <img class="img-fluid" src="{{asset('tanya.jpg')}}" style="width: 100%;" alt="">
                        </div>
                        <div class="col-lg-9 col-md-7 col-sm-7 col-xs-7">
                            <div class="float-left">
                            <h2 class="pt-5" style="color: #853500; "><strong>Persyaratan Penghunian Rumah Susun</strong></h2><br></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 col-md-12 pb-4 p-5">
                        Berdasarkan Perda Nomor 2 Tahun 2009 Pasal 10:<br><br>
                        <ol>
                            <li>Memiliki KTP dan Kartu Keluarga;</li>
                            <li>Memiliki pekerjaan tetap, dibuktikan dengan Surat Keterangan dari pimpinan bagi yang 
                                bekerja secara formal dan Surat Keterangan dari RT,  Lurah, dan Camat bagi yang bekerja secara 
                                informal;</li>
                            <li>Berpenghasilan rendah dengan pendapatan maksimal 2 (dua) kali UMP yang dibuktikan dengan struk 
                                gaji yang ditandatangani oleh pengelola gaji dan rincian pendapatan bagi yang bukan karyawan yang 
                                diketahui oleh RT,  Lurah, dan Camat;</li>
                            <li>Sudah berkeluarga/menikah dengan dibuktikan Surat Nikah;</li>
                            <li>Maksimal anggota keluarga adalah 4 (empat) orang.</li>

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
                        <div class="col-lg-2 col-md-5 col-sm-5 col-xs-5">
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
                            Perda No 2 Tahun 2009 Pasal  9, setiap penghuni Rusun wajib :<br><br>

                            <li>Menjaga keamanan, ketertiban, kenyamanan dan kebersihan dalam unit hunian, dan lingkungan Rumah Susun</li>
                            <li>Mematuhi tata tertib dan peraturan yang sudah  ditetapkan</li>
                            <li>Membayar uang sewa sesuai dengan ketentuan</li>
                            <li>Membayar uang jaminan sesuai dengan ketentuan</li>
                            <li>Memelihara Rumah Susun yang disewa dengan sebaik-baiknya sesuai ketentuan</li>
                            <li>Membayar biaya penggunaan listrik</li>
                            <li>Membayar biaya pengelolaan sampah</li>
                            <li>Membayar biaya penggunaan air bersih</li>
                            <li>Membayar iuran bersama demi kepentingan bersama yang besarnya ditentukan dalam musyawarah bersama penghuni</li>
                            <li>Menyerahkan kembali Unit Hunian Rumah Susun apabila Perjanjian Sewa-menyewa telah berakhir masa sewanya, dengan tanpa syarat apapun.</li>
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
      <div class="col-lg-12 text-center" style="font-size: 15px; color:white"><span>Developed by Dinas Komunikasi, Informasi dan Statistik</span> Kota Banjarmasin, 2021</div>
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