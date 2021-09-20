@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Kota</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('kelurahan.create') }}"><i class="fas fa-plus"> Tambah Kota</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

<div class="card" style="padding: 20px;">
    <table class="table table-hover  table-bordered table-sm bg-light" id="dataTable">
            <thead>
            <tr>
                <th width="20px" class="text-center">No</th>
                <th width="20px" class="text-center">Kota</th>
                <th width="150px"class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @php
            $no=1;
            @endphp
            @foreach ($kota as $k)
            <tr>
                <td class="text-center">{{ $no++ }}</td>
                <td>{{ $k->nama_kota }}</td>
                <td class="text-center">
                    <form action="{{ route('kelurahan.destroy',$kl->id_kelurahan) }}" method="POST" id="form_delete">
    
                        <a class="btn btn-info btn-sm" href="{{ route('kota.show',$kl->id_kota) }}"> Tampil</a>
    
                        <a class="btn btn-primary btn-sm" href="{{ route('kota.edit',$kl->id_kota) }}"> Ubah</a>
    
                        @csrf
                        @method('DELETE')
                        
                        <button class="btn btn-danger btn-sm" onclick="Hapus('{{$kl->id_kota}}')"> Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {!! $kota->links('pagination::bootstrap-4') !!}

        
</div>
 
</div>
@endsection

@section('script')
<script>
    Hapus = (id_kelurahan)=>{
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