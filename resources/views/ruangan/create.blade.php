@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Tambah Ruangan</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success btn-secondary" href="{{ route('ruangan.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
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
    
    <form action="{{ route('ruangan.store') }}" method="POST">
        @csrf
        
        <div class="card" style="padding: 30px;">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nomor Ruangan</strong>
                        <input type="text" name="no_ruangan" class="form-control" placeholder="Isi Nomor Ruangan">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Harga Ruangan</strong>
                        <input type="text" id="rupiah" name="harga_ruangan" class="form-control" placeholder="Isi Harga Ruangan">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status Ruangan</strong>
                        <select name="status_ruangan" class="form-control" >
                            <option value="">---Pilih Status--</option>
                            <option>Terisi</option>
                            <option>Kosong</option>
                            <option>Rusak</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lantai</strong>
                        <select name="id_lantai" class="form-control" >
                            <option value="">---Pilih Lantai--</option>
                            @foreach($lantai as $l)
                            <option value=" {{ $l->id_lantai }}">Lantai {{ $l->lantai }} - {{$l->gedung->nama_gedung}} - {{$l->gedung->blok}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>        
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <div class="float-right">
                        <button type="submit" class="btn btn-success btn-primary"><i class="fas fa-save"></i> Simpan Data</button>
                    </div>
                </div>
            </div>        
        </div>

     
    </form>
</div>

<script>
    var rupiah = document.getElementById("rupiah");
    rupiah.addEventListener("keyup", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, "Rp. ");
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "" + rupiah : "";
    }
</script>
@endsection


