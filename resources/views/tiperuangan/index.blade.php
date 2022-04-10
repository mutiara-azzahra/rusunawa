@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Tipe Ruangan</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('tiperuangan.create') }}"><i class="fas fa-plus"></i> Tambah Tipe Ruangan</a>
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
            <th>Tipe Ruangan</th>
            <th class="text-center">Aksi</th>
        </tr>    
        </thead>
        <tbody>
        @php
        $no=1;
        @endphp
        @foreach ($tipe_ruangan as $tr)
        <tr>
            <td class="text-center">{{ $no++ }}</td>
            <td>Tipe {{ $tr->tipe_ruangan }}</td>
            <td class="text-center">
                <form action="{{ route('tiperuangan.destroy',$tr->id_tipe_ruangan) }}" method="POST" id="form_delete">
 
                    <a class="btn btn-info btn-sm" href="{{ route('tiperuangan.show',$tr->id_tipe_ruangan) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tampil"><i class="fas fa-eye"></i> Tampil</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('tiperuangan.edit',$tr->id_tipe_ruangan) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah"><i class="fas fa-edit"></i> Ubah</a>
 
                    @csrf
                    @method('DELETE')
 
                    <a class="btn btn-danger btn-sm" onclick="Hapus('{{ $tr->id_tipe_ruangan }}')" ><i class="fas fa-trash"></i> Hapus</a>
                </form>
            </td>
        </tr>
        @endforeach            
        </tbody>
    </table>

    {!! $tipe_ruangan->links('pagination::bootstrap-4') !!}

</div>

</div>
 
@endsection

@section('script')

<script>
    Hapus = (id_tipe_ruangan)=>{
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