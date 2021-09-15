@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom: 20px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Daftar User</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('user.index') }}"> Kembali</a>
            </div>
        </div>
    </div>
 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama User</strong>
                {{ $user->nama_user }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username</strong>
                {{ $user->username }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email</strong>
                {{ $user->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role</strong>
                {{ $user->id_role }}
            </div>
        </div>
    </div>
</div>
@endsection