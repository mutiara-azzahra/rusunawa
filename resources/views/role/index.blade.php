@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Tabel Role</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('role.create') }}"> Tambah Role</a>
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
            <th>Nama Role</th>
            <th width="150px"class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        @php
        $no=1;
        @endphp
        @foreach ($role as $r)
        <tr>
            <td class="text-center">{{ $no++ }}</td>
            <td>{{ $r->nama_role }}</td>
            <td class="text-center">
                <form action="{{ route('role.destroy',$r->id_role) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('role.show',$r->id_role) }}">Tampil</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('role.edit',$r->id_role) }}">Ubah</a>
 
                    @csrf
                    @method('DELETE')
 
                    <a class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
       
    </table>
 
    {!! $role->links() !!}
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
            confirmButtonText: 'hapus data' ,
            cancelButtonText: 'batal' ,
            reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $('#form_delete').submit();
                }

        })
    }
</script>
@endsection