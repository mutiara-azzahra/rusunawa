@extends('layouts.admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Tambah Pengajuan Sewa</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('pemohon.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
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
    
    <div class="card" style="padding:30px;">
        @if(Auth::user()->id_role == 1)
        <form action="{{ route('pemohon.store') }}" method="POST" enctype="multipart/form-data">
        @else
        <form action="{{ route('pemohon_user.store') }}" method="POST" enctype="multipart/form-data">
        @endif
        @csrf
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-12 col-lg-4">
                            <div class="form-group">
                                <strong>Gedung</strong>
                                <select name="id_gedung" class="form-control" onchange="getLantai()" id="id_gedung">
                                    <option value="">-- Pilih Gedung --</option>
                                    @foreach($gedung as $l)
                                    <option value="{{ $l->id_gedung }}" @if($pilih_ruangan != null) {{$pilih_ruangan->lantai->id_gedung == $l->id_ruangan ? 'selected' : ''}} @endif> {{ $l->nama_gedung }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12 col-lg-4">
                            <strong>Lantai</strong>
                            <select name="id_lantai" id="id_lantai" class="form-control" onchange="getRuangan()" >
                                <option value="">--Pilih Lantai--</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12 col-lg-4">
                            <div class="form-group">
                                <strong>Ruangan</strong>
                                <select name="id_ruangan"  id="id_ruangan" class="form-control" >
                                    <option value="">--Pilih Ruangan--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->id_role == 1)
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Pemohon</strong>
                        <input type="text" name="nama_kepala_keluarga" class="form-control" placeholder="Isi nama pemohon (kepala keluarga)" value="">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>NIK</strong> (sesuai KTP)
                        <input type="text" name="nik_kepala_keluarga" class="form-control" placeholder="Isi NIK" value="">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Pekerjaan</strong>
                        <input type="text" name="pekerjaan_kepala_keluarga" class="form-control" placeholder="Isi Pekerjaan Kepala Keluarga" value="">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Alamat</strong>
                        <input type="text" name="alamat" class="form-control" placeholder="Isi Alamat" value="">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jumlah Anggota Keluarga</strong>
                        <input type="text" name="jumlah_anggota_keluarga" class="form-control" placeholder="Pilih Jumlah Anggota Keluarga" value="">
                    </div>
                </div>
                @else
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Pemohon</strong>
                        <input type="text" name="nama_kepala_keluarga" class="form-control" placeholder="Isi nama pemohon (kepala keluarga)" value="{{ $pemohon->nama_kepala_keluarga }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>NIK</strong> (sesuai KTP)
                        <input type="text" name="nik_kepala_keluarga" class="form-control" placeholder="Isi NIK" value="{{ $pemohon->nik_kepala_keluarga }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Pekerjaan</strong>
                        <input type="text" name="pekerjaan_kepala_keluarga" class="form-control" placeholder="Isi Pekerjaan Kepala Keluarga" value="{{ $pemohon->pekerjaan_kepala_keluarga }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Alamat</strong>
                        <input type="text" name="alamat" class="form-control" placeholder="Isi Alamat" value="{{ $pemohon->alamat }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jumlah Anggota Keluarga</strong>
                        <input type="text" name="jumlah_anggota_keluarga" class="form-control" placeholder="Pilih Jumlah Anggota Keluarga" value="{{ $pemohon->jumlah_anggota_keluarga }}">
                    </div>
                </div>

                @endif
            </div>

            @if(Auth::user()->id_role == 1)
            <div class="col">
                <div class="col">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <strong>Foto KTP/Surat Keterangan Domisili</strong>
                                <input type="file" name="foto_ktp" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <strong>Foto Akta Nikah</strong>
                                <input type="file" name="foto_akta_nikah" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>                    
                    </div>
                </div>

                <div class="col">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <strong>Foto Surat Keterangan Penghasilan </strong>
                                <input type="file" name="foto_surat_keterangan_penghasilan" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <strong>Foto Anggota Keluarga</strong> (yang akan menempati rusun)
                                <input type="file" name="foto_anggota_keluarga" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @elseif(Auth::user()->id_role == 2)

            @endif
                @if(Auth::user()->id_role == 1)
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Username</strong>
                            <input type="text" name="username" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email</strong>
                            <input type="text" name="email" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Password</strong>
                            <input type="password" name="username" class="form-control" placeholder="">
                        </div>
                    </div>
                @endif

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="padding-right: 10px; margin: 0 !important">
                    <div class="float-right">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Permohonan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>

    //ambil lantai yg ada di gedung
    let getLantai = async () => {
       const id_gedung =  $('#id_gedung').val();
       const endpoint = '/api/lantai/'+id_gedung

        const response = await axios.get('/api/lantai/'+ id_gedung).catch(error => console.log(error));
        const data_lantai = response.data
        const lantaiEl = $('#id_lantai')

        lantaiEl.children('option:not(:first)').remove();

        data_lantai.map((data) => {
            lantaiEl.append(
                '<option value="'+data.id_lantai+'">'+data.lantai+'</option>'
            )
        })
    }

    //ambil ruangan yg ada di lantai
    let getRuangan = async () => {
       const id_lantai =  $('#id_lantai').val();
       const endpoint = '/api/ruangan_gedung/'+id_lantai 

        const response = await axios.get(endpoint).catch(error => console.log(error));
        const data_ruangan = response.data
        const ruanganEl = $('#id_ruangan')

        ruanganEl.children('option:not(:first)').remove();

        data_ruangan.map((data) => {
            console.log(data);
            ruanganEl.append(
                '<option value="'+data.id_ruangan+'">'+data.no_ruangan+'</option>'
            )
        })
    }



</script>
@endsection