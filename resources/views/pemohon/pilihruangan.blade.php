@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Pilih Ruangan</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success btn-secondary" href="{{ route('pemohon.index') }}"><i class="fas fa-arrow-left"></i>  Kembali</a>
            </div>
        </div>
    </div>
    <div class="container">
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
            <div class="text-justify" style="font-size: 20px;">
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
                  Tipe 
                 -
                  Lantai {{$l->lantai}}</h5>
              </div>
            </div>
            
    
            <div class="row">
              <div class="col-lg-4">
                <div class="galeri" style="padding:10px;">
                    <a href="{{ asset('kamar2.jpeg') }}" data-toggle = "lightbox" data-gallery="gallery">
                      <img src="{{ asset('sofa1.jpeg') }}" class= "d-block w-100 imggallery pb-1" style="height: 200px; width: 100%;">
                    </a>
    
                  {{-- <div class="col">
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
                  </div> --}}

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
                            <form action="{{Route('create.permohonan')}}" method="GET">
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
    
    </div>
    
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
</div>

<script src="{{ asset('https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js')}} "></script>

<script>

  let getRuangan = (id) =>{
    let id_ruangan = $(`#input_ruangan${id}`).val();
      axios.get('/api/ruangan/'+ id_ruangan)
      .then(function (response){
        
       console.log(response.data.harga_ruangan)
       $(`#harga${id}`).text(`Rp. ${response.data.harga_ruangan}`)
       $(`#id_ruangan${id}`).val(`${response.data.id_ruangan}`)
      })
      .catch(function (error) {
        console.log(error);
      })
  }
</script>
@endsection