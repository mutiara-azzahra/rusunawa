@extends('layouts.admin')
 
@section('content')
    <div class="container" style="padding:20px; padding-bottom:30px;">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Data User</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="/user/create"><i class="fas fa-plus"></i> Tambah User</a>
                </div>
            </div>
        </div>
     
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

    <div class="card" style="padding: 20px;">
        <table class="table table-hover table-bordered bg-light" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>            
            </thead>
            <tbody>
                @php
                $no=1;
                @endphp
                @foreach ($user as $u)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $u->nama_user }}</td>
                    <td>{{ $u->username }}</td>
                    <td>{{ $u->email }}</td>
                    <td class="text-center">
                        <form action="{{ route('user.destroy',$u->id_user) }}" method="POST">
                        <a href="{{ route('user.reset',$u->id_user) }}" style="margin: 5px;" class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda yakin ingin reset password user ini?')"> Reset</a>
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-danger btn-sm" onclick=""> <i class="fas fa-trash"></i></a>
                        </form>
                    </td>
                </tr>
                @endforeach            
            </tbody>
        </table>        
        {!! $user->links('pagination::bootstrap-4') !!}

    </div>

    </div>
@endsection

@section('script')
<script>
    Hapus = (id_user)=>{
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
