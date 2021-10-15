@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Blok/Kabupaten</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('blok.create') }}"><i class="fas fa-plus"></i> Tambah Data</a>
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
                        <th>Nama Blok/Kabupaten</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($blok as $kc)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td> {{ $kc->blok }}</td>
                        <td class="text-center">
                            <form action="{{ route('blok.destroy',$kc->id_blok) }}" method="POST" id="form_delete">            
                                <a class="btn btn-primary btn-sm" href="{{ route('blok.edit',$kc->id_blok) }}"><i class="fas fa-edit"></i></a>
            
                                @csrf
                                @method('DELETE')
            
                                <a class="btn btn-danger btn-sm" onclick="Hapus('{{ $kc->id_blok }}')" ><i class="fas fa-trash"></i></a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
            {!! $blok->links('pagination::bootstrap-4') !!}
    </div>
        
</div> 
@endsection

@section('script')

<script>
    Hapus = (id_blok)=>{
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