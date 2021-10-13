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

    <title>Login Aplikasi Rusunawa</title>
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
      <img class="card-img-top" src="{{ asset('logo.png') }}" style="width: 100px;">
      <div class="card-body">
        <h5 class="text-center">MASUK AKUN RUSUNAWA</h5>
        <div class="underline-title mx-auto"></div>
        <form method="POST" action="{{ Route('login') }}">
          @csrf
          <div class="form-login">
            <div class="form-group">
              <label for=""></label>
              <input type="text" name="username" class="form-control" id="username" placeholder="Username">
            </div>
            <div class="form-group">
              <label for=""></label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
          </div>
            <div class="button justify-content-center">
              <button type="submit" class="btn btn-primary mx-auto d-block" style="width: 200px">Masuk</button>
            </div>
          </form>
        <div class="register" style="padding-top: 30px;">
            <p class="text-center"><a href="{{ route('forgot-password') }}">Lupa Password?</a></p>
            <p class="text-center">Belum punya akun? <a href="{{ route('formRegister') }}">Register.</p>
        </div>

        <div class="">
          <p class="text-center"><a href="{{ route('Beranda')}}">Kembali</a></p>
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