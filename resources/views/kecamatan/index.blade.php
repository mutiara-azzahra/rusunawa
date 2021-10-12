@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Kecamatan</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('kecamatan.create') }}"><i class="fas fa-plus"></i> Tambah Kecamatan</a>
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
                        <th>Nama Kecamatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($kecamatan as $kc)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ $kc->nama_kecamatan }}</td>
                        <td class="text-center">
                            <form action="{{ route('kecamatan.destroy',$kc->id_kecamatan) }}" method="POST" id="form_delete">
            
                                <a class="btn btn-info btn-sm" href="{{ route('kecamatan.show',$kc->id_kecamatan) }}"><i class="fas fa-eye"></i></a>
            
                                <a class="btn btn-primary btn-sm" href="{{ route('kecamatan.edit',$kc->id_kecamatan) }}"><i class="fas fa-edit"></i></a>
            
                                @csrf
                                @method('DELETE')
            
                                <a class="btn btn-danger btn-sm" onclick="Hapus('{{ $kc->id_kecamatan }}')" ><i class="fas fa-trash"></i></a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
            {!! $kecamatan->links('pagination::bootstrap-4') !!}
    </div>
        
</div> 
@endsection

@section('script')

<script>
    Hapus = (id_kecamatan)=>{
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