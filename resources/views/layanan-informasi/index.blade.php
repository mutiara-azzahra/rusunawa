@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Layanan Informasi Rusun</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('layanan-informasi.create') }}"><i class="fas fa-plus"></i> Tambah Layanan Informasi</a>
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
                        <th>Latar Belakang Pembangunan Rusunawa</th>
                        <th>Sumber Dana</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($info_rusun as $i)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td></td>
                        <td class="text-center">
                            <form action="{{ route('layanan-informasi.destroy',$i->id_info_rusun) }}" method="POST" id="form_delete">
            
                                <a class="btn btn-info btn-sm" href="{{ route('layanan-informasi.show',$i->id_info_rusun) }}"><i class="fas fa-eye"></a>
            
                                <a class="btn btn-primary btn-sm" href="{{ route('layanan-informasi.edit',$i->id_info_rusun) }}"><i class="fas fa-edit"></a>
            
                                @csrf
                                @method('DELETE')
            
                                <a class="btn btn-danger btn-sm" onclick="Hapus('{{ $i->id_info_rusun }}')"><i class="fas fa-trash"></a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
            {!! $info_rusun->links('pagination::bootstrap-4') !!}
    </div>
        
</div> 
@endsection

@section('script')

<script>
    Hapus = (id_informasi)=>{
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