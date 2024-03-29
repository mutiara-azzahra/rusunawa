@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-3">
        <div class="col-lg-12 margin-tb mb-5">
            <div class="float-left">
                <h2>Lihat/Edit Profil</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{route('beranda')}}"><i class="fas fa-arrow-left"></i>  Kembali</a>
            </div>
        </div>
        <div class="col-lg-12 margin-tb mb-3">
            <div class="float-left">
                <h4>Informasi Pribadi</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="card" style="padding: 30px;">
                <div class="row">
                    <div class="col-3">
                      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Profil Saya</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Ubah Password</a>
                        @if(Auth::user()->id_role == 2)
                        {{-- <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Informasi Ruangan</a> --}}
                        @else

                        @endif
                      </div>
                    </div>
                    <div class="col-9">
                      <div class="tab-content" style="padding-left: 10px;" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nama</strong><br>
                                        {{ $user->nama_user }}<br>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email</strong><br>
                                        {{ $user->email }}<br>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Username</strong><br>
                                        {{ $user->username }}<br>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <form action="{{ route('user.update',$user->id_user) }}" method="POST">
                                @csrf
                                @method('PUT')
                         
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <strong>Kata Sandi Lama</strong>
                                            <input type="password" name="password" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <strong>Kata Sandi Baru</strong>
                                            <input type="password" name="password_baru" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-success"> Ubah Kata Sandi</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if(Auth::user()->id_role == 2)
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">Masih Kosong</div>
                        @else

                        @endif
                      </div>
                    </div>
                  </div>
            </div>        
        </div>        
    </div>
</div>
@endsection