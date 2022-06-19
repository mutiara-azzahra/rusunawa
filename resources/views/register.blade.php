<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <!-- Title Logo-->
    <link rel="shortcut icon" href="{{ asset('logo.png')}}">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    
    <!-- Second Font-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">

    <!--CSS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Registrasi Akun SIRSAK Kota Banjarmasin</title>
  </head>
<body>

<!--Login-->

<div class="register">
  <div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Registrasi Akun Baru</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('pemohon.index') }}"> Kembali</a>
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
        <form action="{{ route('pemohon.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nama Pemohon</strong>
                                        <input type="text" name="nama_kepala_keluarga" class="form-control" placeholder="Isi nama pemohon (kepala keluarga)">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>NIK</strong> (sesuai KTP)
                                        <input type="text" name="nik_kepala_keluarga" class="form-control" placeholder="Isi NIK">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Pekerjaan</strong>
                                        <input type="text" name="pekerjaan_kepala_keluarga" class="form-control" placeholder="Isi Pekerjaan Kepala Keluarga">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Alamat</strong>
                                        <input type="text" name="alamat" class="form-control" placeholder="Isi Alamat">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Kota</strong>
                                        <select name="id_kota" class="form-control" id="id_kecamatan" onchange="getKecamatan()">
                                            <option value="">---Pilih Kota--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Kecamatan</strong>
                                        <select name="id_kecamatan" class="form-control" id="id_kecamatan" onchange="getKelurahan()">
                                            <option value="">---Pilih Kecamatan--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Kelurahan</strong>
                                        <select name="id_kelurahan" class="form-control" id="id_kecamatan" >
                                            <option value="">---Pilih Kelurahan--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Jumlah Anggota Keluarga</strong>
                                        <input type="number" min="0" name="jumlah_anggota_keluarga" class="form-control" placeholder="Pilih Jumlah Anggota Keluarga">
                                    </div>
                                </div>
                    </div>
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

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="form-group">
                        <strong>Tanggal Pengajuan</strong>
                        <input type="date" name="tanggal_pengajuan" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="padding-right: 10px; margin: 0 !important">
                    <div class="float-right">
                        <button type="submit" class="btn btn-success">Simpan Permohonan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js')}}"></script>


    <script>
        let getKecamatan = async () => {
           const id_kota =  $('#id_kota').val();
           const endpoint = '/api/kecamatan/'+id_kota
    
            const response = await axios.get('/api/kecamatan/'+ id_kota).catch(error => console.log(error));
            console.log(response.data)
            const data_kecamatan = response.data
            const kecamatanEl = $('#id_kecamatan')
    
            kecamatanEl.children('option:not(:first)').remove();
            
            data_kecamatan.map((data) => {
                kecamatanEl.append(
                    '<option value="'+data.id_kecamatan+'">'+data.nama_kecamatan+'</option>'
                )
            })
        }

        let getKelurahan = async () => {
        const id_kecamatan =  $('#id_kecamatan').val();
        const endpoint = '/api/kelurahan/'+id_kecamatan

            const response = await axios.get('/api/kelurahan/'+id_kecamatan).catch(error => console.log(error));
            const data_kelurahan = response.data
            const kelurahanEl = $('#id_kelurahan')

            kelurahanEl.children('option:not(:first)').remove();

            data_kelurahan.map((data) => {
                kelurahanEl.append(
                    '<option value="'+data.id_kelurahan+'">'+data.nama_kelurahan+'</option>'
                )
            })
        }
    </script>
  </body>
</html>