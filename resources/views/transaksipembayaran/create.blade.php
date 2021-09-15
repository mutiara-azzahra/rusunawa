@extends('layouts.admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('content')

<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h3>Tambah Transaksi Pembayaran</h3>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('transaksipembayaran.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
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

    <div class="card" style="padding: 30px;">
        <form action="{{ route('transaksipembayaran.store') }}" method="POST">
            @csrf
        
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                            <label>Ruangan</label>
                            <select name="id_ruangan" class="form-control select2bs4 p-1" style="width: 100%;" onchange="getPemohon()" id="id_ruangan">
                            <option >-- Pilih Ruangan --</option>
                            @foreach($ruangan as $r)
                            <option value="{{ $r->id_ruangan }}"> {{ $r->no_ruangan }} - {{$r->lantai->lantai}} - {{ $r->lantai->gedung->nama_gedung }} </option>
                            @endforeach
                            </select>
                    </div>
                </div>
                @csrf

                <div class="col">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <strong>Nama Penghuni</strong>
                                <input type="text" name="nama_kepala_keluarga" id="nama_kepala_keluarga" class="form-control" placeholder="" readonly>
                                <input type="hidden" name="id_pemohon" id="id_pemohon" class="form-control" placeholder="">                                
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <strong>Tahun Pembayaran</strong>
                                <input type="number" name="tahun" id="" value="{{ Carbon\carbon::now()->format('Y') }}" class="form-control" placeholder="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>    
    </div>

    <div class="card" style="padding: 30px;">
        <div class="col pb-4">
            <h4>Pembayaran</h4>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga/bulan</strong>
                <input type="text" name="harga" id="harga_ruangan" class="form-control" placeholder="" readonly>
            </div>
        </div>
    
        <div class="col">
            <div class="row">
                {{-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="form-group">
                        <strong>Dari</strong><br>
                        <input id="startInput" type="month" name="awal" lang="id-ID" />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="form-group">
                        <strong>Ke</strong><br>
                        <input id="endInput" type="month" name="akhir" lang="id-ID" />
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="col-lg-12">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group">
                    <strong>Bulan Bayar</strong>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" name="bulan[]" type="checkbox" value="januari" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                Januari
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="bulan[]" type="checkbox" value="februari" id="flexCheckDefault" >
                                <label class="form-check-label" for="flexCheckDefault">
                                Februari
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="bulan[]" type="checkbox" value="maret" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                Maret
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="bulan[]" type="checkbox" value="april" id="flexCheckDefault" >
                                <label class="form-check-label" for="flexCheckDefault">
                                April
                                </label>
                            </div>                                                      
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" name="bulan[]" type="checkbox" value="mei" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                Mei
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="bulan[]" type="checkbox" value="juni" id="flexCheckDefault" >
                                <label class="form-check-label" for="flexCheckDefault">
                                Juni
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="bulan[]" type="checkbox" value="juli" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                Juli
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="bulan[]" type="checkbox" value="agustus" id="flexCheckDefault" >
                                <label class="form-check-label" for="flexCheckDefault">
                                Agustus
                                </label>
                            </div>                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" name="bulan[]" type="checkbox" value="september" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                September
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="bulan[]" type="checkbox" value="oktober" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                Oktober
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="bulan[]" type="checkbox" value="november" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                November
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="bulan[]" type="checkbox" value="desember" id="flexCheckDefault" >
                                <label class="form-check-label" for="flexCheckDefault">
                                Desember
                                </label>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <strong>Telah Diterima Oleh</strong>
                        <input type="text" value=" {{ $user->id_user }} " name="id_user" class="form-control" readonly>
                    </div>
                </div>                   
        </div>
    
        <div class="col">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <div class="float-right">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>  Simpan Data</button>
                </div>
            </div>                    
        </div>
    
    </div>
    </form>
</div>



<script>
    let getPemohon = () => {
       let id_ruangan =  $('#id_ruangan').val();

       axios.get('/api/pemohon/'+ id_ruangan)
          .then(function (response){
            console.log(response);
           if(response.data == '0')
           {
               alert('data pemohon tidak ada')
           }else{
               console.log(response.data)
                $(`#harga_ruangan`).val(response.data.ruangan.harga_ruangan)
                $(`#nama_kepala_keluarga`).val(response.data.nama_kepala_keluarga)
                $(`#id_pemohon`).val(response.data.id_pemohon)
           }
        //    $(`#harga${id}`).text(`Rp. ${response.data.harga_ruangan}`)
        //    $(`#id_ruangan${id}`).val(`${response.data.id_ruangan}`)
          })
          .catch(function (error) {
            console.log(error);
          })

    }

        let startDate = null;
        let endDate = null;
        let diffMonth = null;

        const startEl = document.getElementById("startInput");
        const endEl = document.getElementById("endInput");

    // Function
    const onInput = (variable, value) => {
        if (variable === "startDate") startDate = new Date(value + "-01");
        if (variable === "endDate") endDate = new Date(value + "-01");

        if (startDate && endDate) monthDifferent(startDate, endDate);
        console.log("onInput");
    };

    const monthDifferent = (dateFrom, dateTo) => {
        const monthDiff = dateTo.getMonth() - dateFrom.getMonth();
        const yearDiff = 12 * (dateTo.getFullYear() - dateFrom.getFullYear());
        const result = monthDiff + yearDiff + 1;

        diffMonth = result;

        const hargaEl = document.getElementById('harga');
        const total_bayarEl = document.getElementById('total_bayar');

        if (hargaEl.value) total_bayarEl.value = result * hargaEl.value;
        
        console.log(result);
    };

    // Listener
    startEl.addEventListener("change", (e) => {
        onInput("startDate", e.target.value);
    });
    endEl.addEventListener("change", (e) => {
        onInput("endDate", e.target.value);
    });

   
  </script>

@endsection

