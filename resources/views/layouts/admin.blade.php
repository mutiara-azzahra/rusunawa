
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Dashboard | Aplikasi Rusunawa Kota Banjarmasin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('admin-template/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('admin-template/plugins/fontawesome-free/css/all.min.css') }}">

  
  <link rel="stylesheet" href="{{ asset('admin-template/summernote/summernote.css') }}">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin-template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin-template/dist/css/adminlte.min.css') }}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('admin-template/plugins/select2/css/select2.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('admin-template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

  <!-- Alert -->
  {{-- <link rel="stylesheet" href="sweetalert2.min.css"> --}}

  <!-- Chart js -->
  <link rel="stylesheet" href="{{ asset('admin-template/plugins/chart.js/Chart.min.js') }}">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('admin-template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-fixed navbar-expand" style="background-color: #192841">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: white"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item" style="padding-top: 3px; padding-right: 10px; ">
        <a href ="{{ route('logout') }}">
          <i class="nav-icon fas fa-sign-out-alt" data-bs-toggle="tooltip" data-bs-placement="bottom" style="color: white" title="Keluar"></i>
        </a>
        {{-- <form id="frm-logout" action="{{ route('logout') }}" method="get" style="display: none;">
          @csrf
        </form> --}}
      </li>
    </ul>
  </nav>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light" style="position:fixed;">
    <!-- Brand Logo -->
    <a href="" class="brand-link" style="background-color: #192841">
      <img src="{{ asset('admin-template/dist/img/logo.png') }}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="color: white">Aplikasi Rusunawa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin-template/dist/img/user.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('beranda')}}" class="d-block"> Hai, {{ Auth::user()->nama_user}} !</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              @if(Auth::user()->id_role == 1)
              <li class="nav-item">
                <a class="nav-link {{ set_active('profil.show') }}" href="{{route('profil.show')}}" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Profil Saya</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Data User
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a class="nav-link {{ set_active('user.index') }}" href="{{ Route('user.index') }}" class="nav-link">
                        <p>Data User</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ set_active('penghuni.index') }}" href="{{ Route('penghuni.index') }}" class="nav-link">
                        <p>Data Penghuni</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ set_active('pemohon.index') }}" href="{{ Route('pemohon.index') }}" class="nav-link">
                        <p>Data Pemohon</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ set_active('role.index') }}" href="{{ Route('role.index') }}" class="nav-link">
                        <p>Role</p>
                      </a>
                    </li>
                </ul>
              </li>
              
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-building"></i>
                  <p>
                    Data Master
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a class="nav-link {{ set_active('rusun.index') }}" href="{{ Route('rusun.index') }}" class="nav-link">
                        <p>Rusun</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ set_active('gedung.index') }}" href="{{ Route('gedung.index') }}" class="nav-link">
                        <p>Gedung</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ set_active('blok.index') }}" href="{{ Route('blok.index') }}" class="nav-link">
                        <p>Blok</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ set_active('ruangan.index') }}" href="{{ Route('ruangan.index') }}" class="nav-link">
                        <p>Ruangan</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ set_active('tiperuangan.index') }}" href="{{ Route('tiperuangan.index') }}" class="nav-link">
                        <p>Tipe Ruangan</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ set_active('lantai.index') }}" href="{{ Route('lantai.index') }}" class="nav-link">
                        <p>Lantai</p>
                      </a>
                    </li> 
                    <li class="nav-item">
                      <a class="nav-link {{ set_active('fasilitas.index') }}" href="{{ Route('fasilitas.index') }}" class="nav-link">
                        <p>Fasilitas</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ set_active('layanan-informasi.index') }}" href="{{ Route('layanan-informasi.index') }}" class="nav-link">
                        <p>Layanan Informasi</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ set_active('syarat-mendaftar.index') }}" href="{{ Route('syarat-mendaftar.index') }}" class="nav-link">
                        <p>Syarat Mendaftar</p>
                      </a>
                    </li>
                </ul>
              </li>
              
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-map-marker"></i>
                    <p>
                      Daerah
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a class="nav-link {{ set_active('kelurahan.index') }}" href="{{ Route('kelurahan.index') }}" class="nav-link">
                          <p>Kelurahan</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ set_active('kecamatan.index') }}"  href="{{ Route('kecamatan.index') }}" class="nav-link">
                          <p>Kecamatan</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ set_active('kota.index') }}"  href="{{ Route('kota.index') }}" class="nav-link">
                          <p>Kota</p>
                        </a>
                      </li>
                  </ul>   
                </li>
              
              <li class="nav-item">
                <a class="nav-link {{ set_active('transaksi-pembayaran.index') }}" href="{{ Route('transaksi-pembayaran.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-file-invoice-dollar"></i>
                  <p>Riwayat Pembayaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ set_active('posts.index') }}" href="{{ Route('posts.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-question"></i>
                  <p>Tanya Jawab</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ set_active('Beranda') }}" href="{{ Route('Beranda') }}" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>Halaman Awal</p>
                </a>
              </li>
          @endif
          @if(Auth::user()->id_role == 2)
          <li class="nav-item">
            <a class="nav-link {{ set_active('profil.show') }}" href="{{ Route('profil.show') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Profil Saya</p>
            </a>
          </li>
          @if(Auth::user()->pemohon)
          <li class="nav-item">
            <a class="nav-link {{ set_active('pemohon_user.show') }}" href="{{ Route('pemohon_user.show',Auth::user()->pemohon->id_pemohon) }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Detail Permohonan</p>
            </a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link {{ set_active('pemohon_user.create') }}" href="{{ Route('pemohon_user.create') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Permohonan {{Auth::user()->pemohon}}</p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ Route('transaksi-pembayaran_user.show') }}" class="nav-link">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>Riwayat Pembayaran</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ set_active('Beranda') }}" href="{{ Route('Beranda') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Halaman Utama</p>
            </a>
          </li>
        @endif
          </ul>            
        </nav>
    </div>
  </aside>
  <div class="content-wrapper" >
    @yield('content')
  </div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


<!-- jQuery -->
<script src="{{ asset('admin-template/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin-template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


<!-- DataTables  & Plugins -->
<script src="{{ asset('admin-template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin-template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin-template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin-template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin-template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin-template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin-template/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('admin-template/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin-template/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin-template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin-template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin-template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('admin-template/summernote/summernote.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('admin-template/dist/js/adminlte.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('admin-template/plugins/select2/js/select2.full.min.js')}}"></script>

<script src="{{ asset('admin-template/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- Chart js -->
<script src="{{ asset('admin-template/plugins/chart.js/Chart.min.js') }}"></script>

<!-- Axios-->
<script src="{{ asset('https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js')}}"></script>


{{-- <script src="{{asset('dist/js/demo.js')}}"></script> --}}
<script>
$( document ).ready(function() {
    $('#dataTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


$(function () {
    $('.select2').select2()

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
})

$(document).ready(function() {
  $('#summernote').summernote();
});

</script>



<!-- Alert -->
{{-- <script src="{{ asset('//cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script> --}}
<script src="{{ asset('admin-template/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

@yield('script')

</body>
</html>
