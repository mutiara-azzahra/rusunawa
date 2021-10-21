@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Ruangan</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('ruangan.create') }}"><i class="fas fa-plus"></i> Tambah Ruangan</a>
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
            <th>No</th>
            <th>No Ruangan</th>
            <th>Harga Ruangan</th>
            <th>Status Ruangan</th>
            <th>Lantai</th>
            <th>Gedung</th>
            <th class="text-center">Aksi</th>
        </tr>    
        </thead>
        <tbody>
        @php
        $no=1;
        @endphp
        @foreach ($ruangan as $r)
        <tr>
            <td class="text-center">{{ $no++ }}</td>
            <td>Nomor {{ $r->no_ruangan }}</td>
            <td>@currency($r->harga_ruangan)</td>
            <td>
            @if($r->status_ruangan == 'kosong')
            <div><span class="badge badge-danger">Kosong</span></div>

            @elseif($r->status_ruangan == 'terisi')
            <div><span class="badge badge-success">Terisi</span></div>

            @elseif($r->status_ruangan == 'rusak')
            <div><span class="badge badge-secondary">Rusak</span></div>

            @endif
            </td>
            <td>Lantai {{ $r->lantai->lantai }} </td>
            <td> {{ $r->lantai->gedung->nama_gedung }}</td>
            <td class="text-center">
                <form action="{{ route('ruangan.destroy',$r->id_ruangan) }}" method="POST" id="form_delete">
 
                    <a class="btn btn-info btn-sm" href="{{ route('ruangan.show',$r->id_ruangan) }}"><i class="fas fa-eye"></i></a>
                    <a class="btn btn-primary btn-sm" href="{{ route('ruangan.edit',$r->id_ruangan) }}"><i class="fas fa-edit"></i></a>
 
                    @csrf
                    @method('DELETE')
 
                    <a class="btn btn-danger btn-sm" onclick="Hapus('{{ $r->id_ruangan }}')"><i class="fas fa-trash"></i></a>
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
    Hapus = (id_ruangan)=>{
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