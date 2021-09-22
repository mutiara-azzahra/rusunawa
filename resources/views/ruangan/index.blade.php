@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Ruangan</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('ruangan.create') }}"> Tambah Ruangan</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

<div class="card" style="padding: 20px;">
    <table class="table table-bordered table-hover table-sm bg-light" id="dataTable">
        <thead>
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="20px" class="text-center">No Ruangan</th>
            <th class="text-center">Harga Ruangan</th>
            <th width="20px" class="text-center">Status Ruangan</th>
            <th class="text-center">Lantai</th>
            <th class="text-center">Gedung</th>
            <th width="250px"class="text-center">Aksi</th>
        </tr>    
        </thead>
        <tbody>
        @php
        $no=1;
        @endphp
        @foreach ($ruangan as $r)
        <tr>
            <td class="text-center">{{ $no++ }}</td>
            <td>{{ $r->no_ruangan }}</td>
            <td>Rp. {{ $r->harga_ruangan }},-/bulan</td>
            <td>{{ $r->status_ruangan }}</td>
            <td>Lantai {{ $r->lantai->lantai }} </td>
            <td> {{ $r->lantai->gedung->nama_gedung }}</td>
            <td class="text-center">
                <form action="{{ route('ruangan.destroy',$r->id_ruangan) }}" method="POST" id="form_delete">
 
                    <a class="btn btn-info btn-sm" href="{{ route('ruangan.show',$r->id_ruangan) }}">Tampil</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('ruangan.edit',$r->id_ruangan) }}">Ubah</a>
 
                    @csrf
                    @method('DELETE')
 
                    <a class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
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