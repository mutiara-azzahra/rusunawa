<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">

      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="{{ asset('admin-template/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
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

    <!--CSS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Lupa Password | Sistem Informasi Rumah Susun Kota (SIRSAK) Banjarmasin</title>
  </head>
<body>
<!--Navbar-->

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>

@elseif ($message = Session::get('warning'))
  <div class="alert alert-warning">
      <p>{{ $message }}</p>
  </div>
@endif

<div class="login">
    <div class="card card-login shadow-sm p-4 bg-white rounded " style="width: 400px;">
      <div class="card-body">
        <h5 class="text-align">Lupa Password</h5>
        <div class="underline-title"></div>
        <form method="post" action="{{ route('sendMail')}}">
          @csrf
          <div class="form-login pt-5">
            <div class="form-group">
              <label for="">Masukkan Email Anda</label>
              <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
          </div>
            <div class="button justify-content-center pt-3">
              <button type="submit" class="btn btn-primary d-block" style="width: 150px"> Kirim</button>
            </div>
          </form>
        <div class="p-1 pt-4">
          <div class="float-left">
            <p class="text-center">Kembali Ke Halaman <a href="{{ route('Beranda')}}"> Login</a></p>
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

  </body>
</html>