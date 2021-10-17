@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Tambah Informasi Rusun</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('layanan-informasi.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                        <strong>Rusun</strong>
                        <select name="id_kota" class="form-control" id="id_kota" onchange="getKecamatan()">
                            <option value="">---Pilih Rusun--</option>
                            @foreach($rusun as $r)
                            <option value=" {{ $r->id_rusun }}"> {{ $r->nama_rusun }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="form-group">
                            <strong>Latar Belakang</strong>
                            <input type="text" name="latar_belakang" class="form-control" placeholder="">
                        </div>
                    </div>
                </div>

                      <div class="col-lg-12">
                        <div class="card card-outline card-info">
                          <div class="card-header">
                            <!-- tools box -->
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                      title="Collapse">
                                <i class="fas fa-minus"></i></button>
                              <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                      title="Remove">
                                <i class="fas fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body pad">
                            <div class="mb-3">
                              <textarea id="summernote" placeholder="Place some text here"
                                        "></textarea>
                            </div>



                            <p class="text-sm mb-0">
                              Editor <a href="https://github.com/bootstrap-wysiwyg/bootstrap3-wysiwyg">Documentation and license
                              information.</a>
                            </p>
                          </div>
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

{{-- <script>
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
</script> --}}
@endsection