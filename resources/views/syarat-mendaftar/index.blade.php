@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Syarat Mendaftar</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('syarat-mendaftar.create') }}"><i class="fas fa-plus"></i> Tambah Data</a>
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
                        <th>Syarat Mendaftar</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($syarat_mendaftar as $s)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td> {{ $s->syarat_mendaftar }}</td>
                        <td class="text-center">
                            <form action="{{ route('syarat-mendaftar.destroy',$s->id_syarat_mendaftar) }}" method="POST" id="form_delete">            
                                <a class="btn btn-primary btn-sm" href="{{ route('syarat-mendaftar.edit',$s->id_syarat_mendaftar) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah"><i class="fas fa-edit"></i> Ubah</a>
            
                                @csrf
                                @method('DELETE')
            
                                <a class="btn btn-danger btn-sm" onclick="Hapus('{{ $s->id_syarat_mendaftar }}')" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"><i class="fas fa-trash"></i> Hapus</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
            {!! $syarat_mendaftar->links('pagination::bootstrap-4') !!}
    </div>
        
</div> 
@endsection

@section('script')

<script>
    Hapus = (id_syarat_mendaftar)=>{
        Swal.fire({
            title: 'Apa anda yakin menghapus data ini?',
            text:  "menghapus notifikasi" ,
            showCancelButton: true,
            confirmButtonColor: '#3085d6' ,
            cancelButtonColor: 'red' ,
            confirmButtonText: 'hapus data' ,
            cancelButtonText: 'batal' ,
            reverseButtons: false
            }).then((result) => {
                if (result.value) {
                    $('#form_delete').submit();
                }
        })
    }
</script>
@endsection