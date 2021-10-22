@extends('layouts.admin')

@section('content')
<div class="container" style="padding:20px; padding-bottom:30px;">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Data Gedung</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success btn-secondary" href="{{ route('gedung.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>        
    </div>


<div class="card" style="padding: 30px;">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Gedung</strong><br>
                {{ $gedung->nama_gedung }}<br>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tipe Ruangan</strong><br>
                {{ $gedung->tipe_ruangan->tipe_ruangan }}<br>                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat Gedung</strong><br>
                {{ $gedung->alamat_gedung }}<br>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jumlah Ruangan</strong><br>
                {{ $gedung->jumlah_ruangan }}<br>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status Gedung</strong><br>
                {{ $gedung->status_gedung }}<br>
            </div>
        </div>             
    </div>
</div>

<div class="card" style="padding: 30px;">

    <!-- Galeri -->
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Galeri Gedung</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="" data-toggle="modal"  data-target="#galeri"><i class="fas fa-plus"></i>  Tambah Galeri Gedung</a>
                </div> 
            </div>
        </div>
    <!-- Tabel Galeri -->
    <table class="table  table-bordered table-hover table-sm bg-light" id="dataTable">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Foto</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
        $no=1;
        @endphp
        @foreach ($galeri as $g)
        <tr>
            <td class="text-center">{{ $no++ }}</td>
            <td>{{ $g->kategori}}</td>
            <td class="text-center"><img class="image" src="{{asset('/storage/galeri/'.$g->foto)}}" data-id="{{asset('/storage/galeri/'.$g->foto)}}" alt="" width="100px"></td>
            <td class="text-center">
                        <form action="{{ route('galeri.destroy',$g->id_galeri) }}" id="form_delete_galeri{{$g->id_galeri}}" method="POST">
                            <a class="btn btn-danger btn-sm" onclick="HapusGaleri('{{$g->id_galeri}}')"> Hapus</a>

                            @csrf
                            @method('DELETE')
        
                        </form>
                </form>
            </td>
        </tr>
        </tbody>
        @endforeach
    </table>

    <!-- Modal Galeri -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="galeri">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="card m-3" style="padding:10px;">
                    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                                <div class="form-group">
                                    <strong>Gedung</strong>
                                    <input type="text" value=" {{ $gedung->id_gedung }} " name="id_gedung" class="form-control" readonly style="display: none;">
                                    <input type="text" value=" {{ $gedung->nama_gedung }} " name="" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card m-3" style="padding:10px;">    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Maaf!</strong> Ada yang salah.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                                <div class="form-group">
                                    <strong>Kategori</strong>
                                    <select name="kategori" class="form-control" >
                                        <option value="" >---Pilih Kategori--</option>
                                        <option>Gedung</option>
                                        <option>Fasilitas Gedung</option>
                                        <option>Fasilitas Ruangan</option>
                                        <option>Ruangan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Foto</strong>
                                    <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">                
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-success btn-success"> Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>            
</div>

<!-- Fasilitas-->
<div class="card" style="padding:30px;">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Fasilitas Gedung</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="" data-toggle="modal"  data-target="#fasilitas" id=""><i class="fas fa-plus"></i>  Tambah Fasilitas Gedung</a>
                </div>
            </div>
        </div>
                <!-- Tabel Fasilitas -->
                <table class="table table-hover table-bordered table-sm bg-light" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Fasilitas</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                    $no=1;
                    @endphp
                    @foreach ($fasilitas_gedung as $f)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ $f->fasilitas->nama_fasilitas}}</td>
                        <td>{{ $f->jumlah}}</td>
                        <td class="text-center">
                                    <form action="{{ route('fasilitas-gedung.destroy',$f->id_fasilitas_gedung) }}" id="form_delete_fasilitas{{$f->id_fasilitas_gedung}}" method="POST">
                                        <a class="btn btn-danger btn-sm" onclick="HapusFasilitas('{{$f->id_fasilitas_gedung}}')"> Hapus</a>
            
                                        @csrf
                                        @method('DELETE')
                    
                                    </form>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>
    
        <!-- Modal Tambah Fasilitas-->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="fasilitas">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="card m-3" style="padding:10px;">
                        <form action="{{ route('fasilitas.fasilitas-gedung')}} " method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h5></h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <strong>Gedung</strong>
                                    <input type="text" value=" {{ $gedung->id_gedung }} " name="id_gedung" class="form-control" readonly style="display: none;">
                                    <input type="text" value=" {{ $gedung->nama_gedung }} " name="" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Pilih Nama Fasilitas</strong>
                                    <select name="id_fasilitas" class="form-control" >
                                        <option value="">---Pilih Fasilitas--</option>
                                        @foreach($fasilitas as $f)
                                        <option value=" {{ $f->id_fasilitas }}"> {{ $f->nama_fasilitas }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <strong>Jumlah</strong>
                                    <input type="text" name="jumlah" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-success btn-primary"><i class="fas fa-save"></i>  Simpan Data</button>
                                    </div>
                                </div>
                            </div>   
                        </div>
                       
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Maaf!</strong> Ada yang salah.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <img id="imgShow" src="" alt="" width="100%">
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script>

$('#fasilitas', '#gedung').modal({
  keyboard: false
})


    $(".image").click(function(){
        let data = $(this).data("id");

        $('#imgShow').attr("src", data);
        $('#modalImage').modal('show');
    });
</script>

<script>
    HapusGaleri = (id_galeri)=>{
        Swal.fire({
            title: 'Apa anda yakin menghapus data ini?',
            text:  "menghapus notifikasi" ,
            showCancelButton: true,
            confirmButtonColor: '#3085d6' ,
            cancelButtonColor: 'red' ,
            confirmButtonText: 'hapus data' ,
            cancelButtonText: 'batal' ,
            reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $(`#form_delete_galeri.${id_galeri}`).submit();
                }

        })
    }

    HapusFasilitas = (id_fasilitas_gedung)=>{
        Swal.fire({
            title: 'Apa anda yakin menghapus data ini?',
            text:  "menghapus notifikasi" ,
            showCancelButton: true,
            confirmButtonColor: '#3085d6' ,
            cancelButtonColor: 'red' ,
            confirmButtonText: 'hapus data' ,
            cancelButtonText: 'batal' ,
            reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $(`#form_delete_fasilitas.${id_fasilitas_gedung}`).submit();
                }

        })
    }
</script>


@endsection