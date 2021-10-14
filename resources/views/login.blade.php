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

<div class="login-wrapper">
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
<svg class="clip-top" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#0099ff" fill-opacity="1" d="M0,96L24,106.7C48,117,96,139,144,149.3C192,160,240,160,288,160C336,160,384,160,432,165.3C480,171,528,181,576,181.3C624,181,672,171,720,138.7C768,107,816,53,864,42.7C912,32,960,64,1008,69.3C1056,75,1104,53,1152,64C1200,75,1248,117,1296,149.3C1344,181,1392,203,1416,213.3L1440,224L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z"></path>
</svg>
<svg class="clip-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#0099ff" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
</svg>

</div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  </body>
</html>