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


    <title>Rusunawa {{ $gedung->nama_gedung }} | Sistem Informasi Rusunawa Kota Banjarmasin</title>
  </head>
<body class="bg-custom-1">

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

<div class="container" style="padding-top: 100px;">
  <div class="card" >
      <div class="text-justify">
        <div class="col-lg-12 col-sm-12">
          <h5 style="padding-top: 20px;" style="font-size: 25px;">Rusunawa {{ $gedung->nama_gedung }} Banjarmasin</h5>
            <div class="row" style="padding-left: 15px;">
              <p class="text-muted">{{ $gedung->alamat_gedung }}</p>
            </div>
        </div>
      </div>

    <div class="container" style="padding-top: 20px !important;">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('slider1.jpeg') }}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('slider2.jpeg') }}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('slider3.jpeg') }}" alt="Third slide">
          </div>
        </div>
      </div>
    </div>

    <div style="padding: 40px;">
      <div class="text-justify bawah" style="font-size: 20px;">
        Fasilitas Ruangan
      </div>

      <div class="col-lg-12 col-sm-12">
        <div class="row" style="padding-top: 20px;">
          <div class="col">
            <div style="height:70px;"><img src="{{ asset('air-conditioner.png') }}" alt="" style="width: 50px;"></div>
            <div>AC</div>
          </div>
          <div class="col">
            <div style="height:70px;"><img src="{{ asset('smart-refrigerator.png') }}" alt="" style="width: 50px;"></div>
            <div>Kulkas</div>
          </div>
          <div class="col">
            <div style="height:70px;"><img src="{{ asset('dinner-table.png') }}" alt="" style="width: 50px;"></div>
            <div>Meja Makan</div>
          </div>
          <div class="col">
            <div style="height:70px;"><img src="{{ asset('sofa.png') }}" alt="" style="width: 50px;"></div>
            <div>Sofa</div>
          </div>
          <div class="col">
            <div style="height:70px;"><img src="{{ asset('beds.png') }}" alt="" style="width: 50px;"></div>
            <div>Kasur</div>
          </div>
        </div>          
      </div>


    </div>

    <div style="padding: 40px;">
      <div class="text-justify bawah" style="font-size: 20px;">
        Denah
      </div>

      <div class="row">
        <div class="col-lg-7">
          <div class="col-lg-12 col-sm-12">
            <div class="row" style="padding-top: 20px;">
              Lantai 1
            </div>
            
            <div class="row" style="padding-top: 20px;">
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">123</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">124</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">125</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">126</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-success">127</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">128</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">129</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">130</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">131</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">132</button>
            </div> 
            <div class="row" style="padding-top: 20px;">
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">133</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">134</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-warning">135</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">135</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-success">137</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">138</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">139</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">140</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">141</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">142</button>
            </div>     

          </div>

          <div class="col-lg-12 col-sm-12">
            <div class="row" style="padding-top: 20px;">
              Lantai 2
            </div>
            
            <div class="row" style="padding-top: 20px;">
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">143</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">144</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">145</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">146</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-success">147</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">148</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">149</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">150</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">151</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">152</button>
            </div> 
            <div class="row" style="padding-top: 20px;">
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">153</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">154</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">155</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">156</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-success">157</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">158</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">159</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">160</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">161</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">162</button>
            </div>          
          </div>

          <div class="col-lg-12 col-sm-12">
            <div class="row" style="padding-top: 20px;">
              Lantai 3
            </div>
            
            <div class="row" style="padding-top: 20px;">
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">163</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">164</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">165</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">166</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-success">167</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">168</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-dark">169</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">170</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">171</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">172</button>
            </div> 
            <div class="row" style="padding-top: 20px;">
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">173</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">174</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-warning">175</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">176</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-success">177</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">178</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">179</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">180</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-dark">181</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">182</button>
            </div>     

          </div>

          <div class="col-lg-12 col-sm-12">
            <div class="row" style="padding-top: 20px;">
              Lantai 4
            </div>
            
            <div class="row" style="padding-top: 20px;">
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">184</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">185</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">186</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">187</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-success">188</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">189</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">190</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">191</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">192</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">193</button>
            </div>
            <div class="row" style="padding-top: 20px;">
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">184</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">185</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">186</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">187</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-success">188</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">189</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-dark">190</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">191</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">192</button>
              <button type="button" style="height: 50px; margin-right:2px" class="btn btn-danger">193</button>
            </div> 
          </div>        
        </div>

        <div class="col-lg-4 p-3">
          <div class="card" style="padding-top: 20px; padding-bottom: 40px;">
            <div class="col-12">
              <div class="float-left" style="padding-bottom: 5px;">
                Keterangan Ruangan:
              </div>
            </div>

            <div class="row">
              <div class="col-lg-2">
                <div class="col">
                  <button type="button" style="height: 20px; width: 40px; margin-right:2px" class="btn btn-success"></button>
                </div>
                <div class="col">
                  <button type="button" style="height: 20px; width: 40px; margin-right:2px" class="btn btn-warning"></button>
                </div>
                <div class="col">
                  <button type="button" style="height: 20px; width: 40px; margin-right:2px" class="btn btn-danger"></button>                  
                </div>
                <div class="col">
                  <button type="button" style="height: 20px; width: 40px; margin-right:2px" class="btn btn-dark"></button>                  
                </div>
              </div>
              <div class="col-lg-10">
                <div class="float-left text-left">
                  Terisi<br>
                  Dalam Proses Penyewaan<br>
                  Kosong<br>
                  Rusak<br>
                </div>
              </div>
            </div>

          </div>
        </div>        
      </div>


    </div>
    
  </div>
</div>

<div>
<!--Lantai 1-->
@foreach($lantai as $l)
<div class="container" style="padding-top: 20px;">
  <div class="card p-3" >
      <div class="text-justify">
        <div class="col">
          <h5 style="padding-top: 20px; padding-left: 10px;">
            Lantai {{$l->lantai}}</h5>
        </div>
      </div>
      

      <div class="row">
        <div class="col-lg-4">
          <div class="galeri" style="padding:10px;">
              <a href="{{ asset('kamar2.jpeg') }}" data-toggle = "lightbox" data-gallery="gallery">
                <img src="{{ asset('sofa1.jpeg') }}" class= "d-block w-100 imggallery pb-1" style="height: 200px; width: 100%;">
              </a>

            <div class="col">
              <div class="row">
                <div class="col p-0">
                  <a href="{{ asset('sofa3.jpeg') }}" data-toggle = "lightbox" data-gallery="gallery">
                    <img src="{{ asset('sofa3.jpeg') }}" alt="" class= "imggallery">
                  </a>
                </div>
                <div class="col p-0">
                  <a href="{{ asset('toilet1.jpeg') }}" data-toggle = "lightbox" data-gallery="gallery">
                    <img src="{{ asset('toilet1.jpeg') }}" alt="" class= "imggallery">
                  </a>
                </div>
                <div class="col p-0">
                  <a href="{{ asset('shower1.jpeg') }}" data-toggle = "lightbox" data-gallery="gallery">
                    <img src="{{ asset('shower1.jpeg') }}" alt="" class= "imggallery">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-8 col-sm-12">
          <div class="card p-4">
            <div class="row">

              <div class="col-lg-3 col-sm-12">
                <p class="text-justify">Daftar Ruangan:</p>
                <div class="form-group">
                 <label for=""> Kode Ruangan</label>
                 <select class="form-control" name="" id="input_ruangan{{$l->id_lantai}}" onchange="getRuangan({{$l->id_lantai}})">
                  <option value="">---Pilih Ruangan--</option>                   
                  @foreach($l->ruangan as $r)
                  <option value="{{ $r->id_ruangan}}">{{$r->no_ruangan}}</option>
                  @endforeach
                 </select>
                </div>
                  {{-- <p class="text-justify">
                    1 Double Bed<br>
                    1 Kulkas<br>
                    1 Meja Makan<br>
                    1 AC<br>
                    Listrik Token<br>
                    Air PDAM<br>
                  </p> --}}
              </div>

              <div class="col-lg-4">
                <p class="text-justify"><span style="color:#d0312d">({{$l->ruangan->count()}} kamar tersedia)</span></p>
              </div>
              <div class="col-lg-5 order-sm-12 order-sm-2">
                  <div class="text-right">
                    Harga Ruangan <br>
                  </div>
                  @csrf
                  <div class="text-right">
                    <span id="harga{{$l->id_lantai}}" style="font: bold; color:#F58735; font-size: 25px;">Rp. 0 </span>/bulan<br><br>
                    @if (Auth::check()) 
                      <form action="{{Route('create.pemohon')}}" method="GET">
                        @csrf
                        <input type="hidden" id="id_ruangan{{$l->id_lantai}}"  name="id_ruangan">
                        <button class="btn btn-primary" style="width: 200px;">Pesan Ruangan</button>
                      </form>
                      @else 
                      <a href="{{ route('loginPage') }}" class="btn btn-primary" style="width: 200px;">Pesan Ruangan</a>
                    @endif

                  </div>    
              </div>

            </div>
          </div>
        </div>
      </div>

  </div>
</div>
@endforeach


<div id="gallery">
<h4 class="text-center d-none">Lightbox Photo Gallery</h4>
<br>
  <div class="row text-center">
    <div class="col-lg-4">
      <a href="{{ asset('kamar2.jpeg') }}" data-toggle = "lightbox" data-gallery="gallery">
        <img src="{{ asset('kamar2.jpeg') }}" class= "imggallery d-none">
      </a>
    </div>
    <div class="col-lg-4">
      <a href="{{ asset('sofa3.jpeg') }}" data-gallery="gallery">
        <img src="{{ asset('sofa3.jpeg') }}" class = "imggallery d-none ">
      </a>
    </div>
    <div class="col-lg-4">
      <a href="{{ asset('toilet1.jpeg') }}" data-gallery="gallery">
        <img src="{{ asset('toilet1.jpeg') }}" class = "imggallery d-none">
      </a>
    </div>
          <div class="col-lg-4">
      <a href="{{ asset('shower1.jpeg') }}" data-gallery="gallery">
        <img src="{{ asset('shower1.jpeg') }}" class= "imggallery d-none">
      </a>
    </div>
    <div class="col-lg-4">
      <a href="{{ asset('ruangtamu1.jpeg') }}" data-gallery="gallery">
        <img src="{{ asset('ruangtamu1.jpeg') }}" class = "imggallery d-none">
      </a>
    </div>
    <div class="col-lg-4">
      <a href="{{ asset('dapur1.jpeg') }}" data-gallery="gallery">
        <img src="{{asset('dapur1.jpeg')}}" class = "imggallery d-none">
      </a>
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