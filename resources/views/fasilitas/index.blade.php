@extends('layouts.admin')
 
@section('content')
<div class="section" style="padding:20px; padding-bottom:30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Fasilitas</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('fasilitas.create') }}"><i class="fas fa-plus"></i> Tambah Fasilitas Umum</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

<div class="card" style="padding: 20px;">
<table class="table table-hover table-sm bg-light" id="dataTable">
        <thead>
            <tr>
            <th width="20px" class="text-center">No</th>
            <th width="20px" class="text-center">Nama Fasilitas Umum</th>
            <th width="20px" class="text-center">Icon</th>
            <th width="150px"class="text-center">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @php
        $no=1;
        @endphp
        @foreach ($fasilitas as $fr)
        <tr>
            <td class="text-center">{{ $no++ }}</td>
            <td>{{ $fr->nama_fasilitas }}</td>
            <td class="text-center"><img class="image" src="{{asset('/storage/icon_galeri/'.$fr->icon)}}" data-id="{{asset('/storage/icon_galeri/'.$fr->icon)}}" alt="" width="100px"></td>
            <td class="text-center">
                <form action="{{ route('fasilitas.destroy',$fr->id_fasilitas) }}" method="POST" id="form_delete">
 
                    <a class="btn btn-info btn-sm" href="{{ route('fasilitas.show',$fr->id_fasilitas) }}"> Tampil</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('fasilitas.edit',$fr->id_fasilitas) }}"> Ubah</a>
                    <a class="btn btn-danger btn-sm" onclick="Hapus('{{$fr->id_fasilitas}}')"> Hapus</a>

                    @csrf
                    @method('DELETE')
 
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
        
    </table>
 
    {!! $fasilitas->links('pagination::bootstrap-4') !!}
</div>
    

</div>
 
@endsection

@section('script')

<script>
    Hapus = (id_fasilitas)=>{
        Swal.fire({
            title: 'Apa anda yakin menghapus data ini?',
            text:  "menghapus notifikasi" ,
            showCancelButton: true,
            confirmButtonColor: '#3085d6' ,
            cancelButtonColor: 'red' ,
            confirmButtonText: 'Hapus data' ,
            cancelButtonText: 'Batal' ,
            reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $('#form_delete').submit();
                }

        })
    }
</script>
@endsection