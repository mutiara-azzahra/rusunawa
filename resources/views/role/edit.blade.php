@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Ubah Role/Level Pengguna</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('role.index') }}"> Kembali</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Maaf!</strong> Ada yang salah<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="{{ route('role.update',$role->id_role) }}" method="POST">
        @csrf
        @method('PUT')
 
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Role</strong>
                <input type="text" name="nama_role" class="form-control" placeholder="Isi nama role" value= "{{ $role->nama_role }}">  
            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary"> Ubah</button>
        </div>
    </div>
 
    </form>
</div>
@endsection