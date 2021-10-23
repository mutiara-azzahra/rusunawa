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

    <link rel="shortcut icon" href="{{ asset('logo.png')}}">
    
    <!--CSS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Login Aplikasi Rusunawa</title>
  </head>
<body>
<!--Navbar-->

<div class="login-wrapper">
  <div class="login">
    <div class="card card-login shadow-sm p-4 bg-white rounded" style="width: 500px;">
      <img class="card-img-top" src="{{ asset('logo.png') }}" style="width: 100px;">
      <div class="card-body">
        <h5 class="text-center">MASUK AKUN RUSUNAWA</h5>
        <div class="underline-title mx-auto"></div>
        
        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            <p>{{ $message }}</p>
        </div>
        @elseif ($message = Session::get('warning'))
        @endif

        <form method="POST" action="{{ Route('login') }}">
          @csrf
            <div class="form-group mt-3">
              <input type="text" name="username" class="form-control" id="username" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="button justify-content-center">
              <button type="submit" class="btn btn-primary mx-auto d-block mt-2" style="width: 200px">Masuk</button>
            </div>
          </form>
          <div class="button justify-content-center">
            <a type="submit" href="{{ route('formRegister') }}" class="btn btn-success mx-auto d-block" style="width: 200px">Register</a>
          </div>
          <div class="text-center">
            <div class="button justify-content-center">
              <a href="{{ route('forgot-password') }}" class="mx-auto d-block" style="width: 200px">Lupa Password?</a>
            </div>
            <div class="button justify-content-center">
              <a href="{{ route('Beranda')}}" class="mx-auto d-block" style="width: 200px">Kembali</a>
            </div>
          </div>
          
      </div>
  
    </div>

</div>
{{-- <svg class="clip-top" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#ffa500" fill-opacity="1" d="M0,128L40,133.3C80,139,160,149,240,133.3C320,117,400,75,480,90.7C560,107,640,181,720,229.3C800,277,880,299,960,277.3C1040,256,1120,192,1200,192C1280,192,1360,256,1400,288L1440,320L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path>
</svg> --}}
<svg class="clip-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#ffb736" fill-opacity="1" d="M0,128L40,133.3C80,139,160,149,240,133.3C320,117,400,75,480,90.7C560,107,640,181,720,229.3C800,277,880,299,960,277.3C1040,256,1120,192,1200,192C1280,192,1360,256,1400,288L1440,320L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
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