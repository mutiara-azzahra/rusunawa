@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Rusun</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('rusun.create') }}"><i class="fas fa-plus"></i> Tambah Data</a>
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
                        <th>Nama Rusun</th>
                        <th>Alamat</th>
                        <th>Foto</th>
                        <th width="150px"class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($rusun as $r)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td> {{ $r->nama_rusun }}</td>
                        <td> {{ $r->alamat }} </td>
                        <td class="text-center"><img class="image" src="{{asset('/storage/rusun/'.$r->foto)}}" data-id="{{asset('/storage/rusun/'.$r->foto)}}" alt="" width="100px"></td>
                        <td class="text-center">
                            <form action="{{ route('rusun.destroy',$r->id_rusun) }}" method="POST" id="form_delete">            
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-primary btn-sm" href="{{ route('rusun.edit',$r->id_rusun) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger btn-sm" onclick="Hapus('{{ $r->id_rusun }}')" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"><i class="fas fa-trash"></i></a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
            {!! $rusun->links('pagination::bootstrap-4') !!}
    </div>
        
</div> 
@endsection

@section('script')

<script>
    Hapus = (id_rusun)=>{
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