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
                        <a href="{{ route('user.reset',$u->id_user) }}" style="margin: 5px;" class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda yakin ingin reset password user ini?')"> Reset</a>

                        <form action="{{ route('user.destroy',$u->id_user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"> Hapus</button>
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

