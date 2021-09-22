@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Daftar Kelurahan</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('kelurahan.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Maaf!</strong> Ada yang salah<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card" style="padding: 30px;">
        <form action="{{ route('kelurahan.store') }}" method="POST">
            @csrf
        
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kota</strong>
                        <select name="id_kota" class="form-control" id="id_kota" onchange="getKecamatan()">
                            <option value="">---Pilih Kota--</option>
                            @foreach($kota as $k)
                            <option value=" {{ $k->id_kota }}"> {{ $k->nama_kota }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kecamatan</strong>
                        <select name="id_kecamatan" class="form-control" id="id_kecamatan" >
                            <option value="">---Pilih Kecamatan--</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Kelurahan</strong>
                        <input type="text" name="nama_kelurahan" class="form-control" placeholder="Tambah Nama Kelurahan">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <div class="float-right">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Data</button>
                    </div>
                </div>
            </div>
        
        </form>        
    </div>

</div>

<script>
    let getKecamatan = async () => {
       const id_kota =  $('#id_kota').val();
       const endpoint = '/api/kecamatan/'+id_kota

        const response = await axios.get('/api/kecamatan/'+ id_kota).catch(error => console.log(error));
        const data_kecamatan = response.data
        const kecamatanEl = $('#id_kecamatan')

        kecamatanEl.children('option:not(:first)').remove();

        data_kecamatan.map((data) => {
            kecamatanEl.append(
                '<option value="'+data.id_kecamatan+'">'+data.nama_kecamatan+'</option>'
            )
        })
    }
</script>
@endsection