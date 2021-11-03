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

    <link rel="preconnect" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel = "stylesheet" crossorigin="anonymous">

    <!--CSS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <title>Rusunawa {{ $rusun->nama_rusun }} | Sistem Informasi Rusunawa Kota Banjarmasin</title>
  </head>
<body class="bg-custom-1">

<!--Navbar-->
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

<div class="container ml-3">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="float-left ">Pilih Gedung</h3>
    </div>
    <div class="col-lg-12">
      <div class="container">
        <div class="row">
          @foreach($gedung as $g)
          <div class="float-left">
            <div class="card m-3" style="width: 20rem;">
              <div class="foto p-0">
                @if($g->galeri->isNotEmpty())
                <img class="" image src="{{asset('/storage/galeri/'.$g->galeri->first()->foto )}}" data-id="{{asset('/storage/galeri/'.$g->galeri )}}" alt="" width="100%" height="200px;">
                @else
                <img class="" image src="{{asset('/building.jpg')}}" data-id="{{asset('/storage/galeri/no_image.jpg' )}}" alt="" width="100%" height="200px;">
                @endif
              </div>
              <div class="detail pt-3 pb-3 pl-3 text-left">
                <h5>Gedung {{$g->nama_gedung}} {{$g->blok}}</h5>
                  {{ $g->alamat_gedung }}<br>
                  {{$ruangan->whereIn('id_lantai',$g->id_lantai)->where('status_ruangan','kosong')->count()}} Ruangan Tersedia<br>
                  @if(Auth::check())
                    @if(Auth::user()->id_role == 2)
                    <div class="pt-2"><a href="{{ route('pemohon.pilihruangan',$g->id_gedung)}}" class="btn btn-md btn-primary">PESAN SEKARANG</a></div>
                    @endif
                  
                  @else
                  <div class="pt-2"><a href="{{ route('detailgedung',$g->id_gedung)}}" class="btn btn-md btn-primary">PESAN SEKARANG</a></div>
                  @endif
              </div>
            </div>
            
          </div>
          @endforeach        
        </div>
      </div>
    </div>
  </div>

</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Lightbox Script -->
    <script>
      $(document).on("click", '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
      });

      let getRuangan = (id) =>{
        let id_ruangan = $(`#input_ruangan${id}`).val();
          axios.get('/api/ruangan_harga/'+ id_ruangan)
          .then(function (response){
           
           console.log(response.data)
           $(`#id_ruangan${id}`).val(`${response.data.id_ruangan}`) 
           $(`#harga${id}`).text(`Rp. ${response.data.harga_ruangan}`)
           
          })
          .catch(function (error) {
            console.log(error);
          })
      }
    </script>
  </body> 
</html>