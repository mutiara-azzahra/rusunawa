<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin-template/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    
    <!-- Second Font-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    
    <link rel="shortcut icon" href="{{ asset('logo.png')}}">
    
    <!--CSS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Registrasi Akun SIRSAK Kota Banjarmasin</title>
  </head>
<body class="bg-custom-1">

<!--Login-->

<div class="register">
  <div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-4">
        <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Registrasi Akun Baru SIRSAK Kota Banjarmasin</h2>
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
    
        <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="card pt-3 pb-3 m-2">
                        <table class="text-left">
                                    <tr>
                                        <td class="p-3" style="padding-right:50px;"><strong>Username</strong></td>
                                        <td><input style="width:300px;" type="text" name="username" class="form-control" placeholder="Username"></td>
                                    </tr>
                                    <tr>
                                        <td class="p-3"style="padding-right:50px;"><strong>Email</strong></td>
                                        <td><input style="width:300px;" type="text" name="email" class="form-control" placeholder="contoh@email.com"></td>
                                    </tr>
                                    <tr>
                                        <td class="p-3" style="padding-right:50px;"><strong>Password</strong></td>
                                        <td><input style="width:300px;" type="password" name="password" class="form-control" placeholder="Password"></td>
                                    </tr>
                        </table>                        
                    </div>

                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="card pt-3 pb-3 m-2">
                        <table class="text-left">
                                    <tr>
                                        <td class="p-3" ><strong>Nama Pemohon</strong></td>
                                        <td><input style="width:300px;" type="text" name="nama_kepala_keluarga" class="form-control mr-2" placeholder="Isi nama kepala keluarga"></td>
                                    </tr>
                                    <tr>
                                        <td class="p-3"><strong>NIK  </strong><span style="color:red">*sesuai KTP</span></td>
                                        <td><input style="width:300px;" type="text" name="nik_kepala_keluarga" class="form-control mr-2" placeholder="Isi NIK" maxlength="16" minlength="16"></td>
                                    </tr>
                                    <tr>
                                        <td class="p-3" ><strong>Pekerjaan</strong></td>
                                        <td><input style="width:300px;"  type="text" name="pekerjaan_kepala_keluarga" class="form-control mr-2" placeholder="Isi pekerjaan"></td>
                                    </tr>
                                    <tr>
                                        <td class="p-3" ><strong>Alamat</strong></td>
                                        <td><input style="width:300px;" type="text" name="alamat" class="form-control mr-2" placeholder="Isi alamat"></td>
                                    </tr>
                                    <tr>
                                        <td class="p-3" ><strong>No. HP</strong></td>
                                        <td><input style="width:300px;" type="text" name="no_hp" class="form-control mr-2" placeholder="Isi nomor handphone"></td>
                                    </tr>
                                    <tr>
                                        <td class="p-3" ><strong>Kota</strong></td>
                                        <td>
                                            <select style="width:300px;" name="id_kota" class="form-control mr-2" id="id_kota" onchange="getKecamatan()" >
                                                <option value="">-- Pilih Kota --</option>
                                                @foreach ($kota as $k)
                                                 <option value="{{$k->id_kota}}">{{$k->nama_kota}}</option>   
                                                @endforeach
                                                </select>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-3"><strong>Kecamatan</strong></td>
                                        <td>
                                            <select style="width:300px;" name="id_kecamatan" class="form-control mr-2" id="id_kecamatan" onchange="getKelurahan()" >
                                                <option value="">-- Pilih Kecamatan --</option>
                                                </select>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-3" ><strong>Kelurahan</strong></td>
                                        <td>
                                            <select style="width:300px;" name="id_kelurahan" class="form-control mr-2" id="id_kelurahan" >
                                                <option value="">-- Pilih Kelurahan --</option>
                                                </select>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-3" ><strong>Jumlah Anggota Keluarga</strong></td>
                                        <td><input style="width:300px;" type="number" min="0" name="jumlah_anggota_keluarga" class="form-control mr-2" placeholder="Isi Jumlah Anggota Keluarga"></td>
                                    </tr>
                        </table>                        
                    </div>

                </div>
        </div>
                                  

        <div class="col-xs-12 col-sm-12 col-md-12 text-center p-4">
            <div class="float-left">
                <a class="btn btn-success" href="{{ route('login') }}"> 
                    <i class="fas fa-arrow-left"></i>   Kembali</a>
            </div>
            <div class="float-right">
                <button type="submit" class="btn btn-primary" href="{{ route('login') }}"> Register Akun 
                    <i class="fas fa-arrow-right"></i>
                </button>
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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js')}}"></script>


    <script>
        let getKecamatan = async () => {
           const id_kota =  $('#id_kota').val();
           const endpoint = '/api/kecamatan/'+id_kota
    
            const response = await axios.get('/api/kecamatan/'+ id_kota).catch(error => console.log(error));
            const data_kecamatan = response.data
            // console.log(data_kecamatan)
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
            console.log(response)
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