<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penghuni Rusunawa</title>
    <style>
    h4,h2{
        font-family:serif;
    }
        body{
            font-family:sans-serif;
        }
        table{
        border-collapse: collapse;
        width:100%;
      }
      table, th, td{
        border: 1px solid black;
      }
      th{
        text-align: center;
      }
      td{
        text-align: center;
      }
      br{
          margin-bottom: 5px !important;
      }
     .judul{
         text-align: center;
     }
     .header{
         margin-bottom: 0px;
         text-align: center;
         height: 110px;
         padding: 0px;
     }
     .pemko{
         width:70px;
     }
     .logo{
         float: left;
         margin-right: 0px;
         width: 18%;
         padding:0px;
         text-align: right;
     }
     .headtext{
         float:right;
         margin-left: 0px;
         width: 72%;
         padding-left:0px;
         padding-right:10%;
     }
     hr{
         margin-top: 10%;
         height: 3px;
         background-color: black;
         width:100%;
     }
     .ttd{
         margin-left:65%;
         text-align: center;
         text-transform: uppercase;
     }
     .text-right{
         text-align:right;
     }
     .isi{
         padding:10px;
     }
    </style>
</head>
<body>
    <div class="header">
            <div class="logo">
                    <img class="pemko" src="logo.png">
            </div>
            <div class="headtext">
                <h3 style="margin:0px;">PEMERINTAH KOTA BANJARMASIN</h3>
                <h3 style="margin:0px;">DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN</h3>
                <p style="margin:0px;">Jalan Teluk Kelayan, Kelurahan Kelayan Barat, Kecamatan Banjarmasin Selatan, Kota Banjarmasin</p>
            </div>
            <br>
    </div>
    <div class="container">
    <hr style="margin-top:1px;">
        <div class="isi">
            <h2 style="text-align:center;">NOTA PEMBAYARAN</h2>
            <br>
            <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $p)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$p->bulan}}</td>
                                    <td>{{$p->harga}}</td>
                                    
                                    {{-- <td>{{$p->ruangan->lantai->gedung->nama_gedung}}</td>
                                    <td>{{$p->ruangan->lantai->lantai}}</td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                <br>
                <br>
                <div class="ttd">
                <p style="margin:0px"> Banjarmasin,</p>
                <h6 style="margin:0px">Mengetahui</h6>
                <h5 style="margin:0px">Kepala Dinas Perumahan dan Kawasan Permukiman</h5>
                <br>
                <br>
                <h5 style="text-decoration:underline; margin:0px">(...........................)</h5>
                <!-- <h5 style="margin:0px">NIP. 19620606 199203 2 007</h5> -->
                </div>
            </div>
        </div>
    </body>
</html>