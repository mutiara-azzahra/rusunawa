@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">

    <div class="col-md-12 col-lg-12">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Data Lantai</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('lantai.create') }}"><i class="fas fa-plus"></i> Tambah Lantai</a>
                </div>
            </div>
        </div>
    </div>

 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

<div class="card" style="padding: 20px;">
    <table class="table table-hover table-bordered table-sm bg-light" id="dataTable">
        <thead>
            <tr>
                <th class="text-center">Lantai</th>
                <th class="text-center">Gedung</th>
                <th width="250px" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @php
        $no=1;
        @endphp
        @foreach ($lantai as $l)
        <tr>
            <td class="text-center">{{ $l->lantai }}</td>
            <td >{{ $l->gedung->nama_gedung }}</td>
            <td class="text-center">
                <form action="{{ route('lantai.destroy',$l->id_lantai) }}" method="POST" id="form_delete">
 
                    <a class="btn btn-info btn-sm" href="{{ route('lantai.show',$l->id_lantai) }}">Tampil</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('lantai.edit',$l->id_lantai) }}">Ubah</a>
                    <a class="btn btn-danger btn-sm" onclick="Hapus('{{ $l->id_lantai }}')">Hapus</a>

                    @csrf
                    @method('DELETE')
 
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

</div> 
@endsection

@section('script')

<script>
    Hapus = (id_pemohon)=>{
        Swal.fire({
            title: 'Apa anda yakin menghapus data ini?',
            text:  "menghapus notifikasi" ,
            showCancelButton: true,
            confirmButtonColor: '#3085d6' ,
            cancelButtonColor: 'red' ,
            confirmButtonText: 'Hapus Data' ,
            cancelButtonText: 'Batal' ,
            reverseButtons: false
            }).then((result) => {
                if (result.value) {
                    $('#form_delete').submit();
                }
        })
    }
</script>
@endsection