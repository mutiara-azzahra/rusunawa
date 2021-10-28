@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Pilih Rusun</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success btn-secondary" href="{{ route('pemohon.index') }}"><i class="fas fa-arrow-left"></i>  Kembali</a>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        @foreach($rusun as $r)
        <div class="card">
            <div class="row">
                <div class="col-lg-4">
                    {{-- @if($g->galeri->isNotEmpty())
                    <img class="card-img-top" image src="{{asset('/storage/galeri/'.$g->galeri->first()->foto )}}" data-id="{{asset('/storage/galeri/'.$g->galeri )}}" alt="" width="100%" height="200px;">
                    @else
                    <img class="card-img-top" image src="{{asset('/building.jpg')}}" data-id="{{asset('/storage/galeri/no_image.jpg' )}}" alt="" width="100%" height="200px;">
                    @endif --}}
                    <img class="" image src="{{asset('/storage/rusun/'.$r->foto)}}" data-id="{{asset('/storage/rusun/'.$r->foto)}}" alt="" width="100%" height="200px;">
                </div>
                <div class="col-lg-8" style="padding: 30px;">
                    <b>Rusunawa {{$r->nama_rusun}}</b>
                    <p class="card-text text-muted">{{$r->alamat}}</p>
                    {{-- <p class="card-text" style="color: red">{{$ruangan->whereIn('id_lantai',$g->id_lantai)->where('status_ruangan','kosong')->count()}} Ruangan Tersedia</p>--}}
                    <a href="{{ route('pemohon.pilihgedung',$r->id_rusun)}}"  class="btn btn-success">Pilih Gedung</a>
                </div>
            </div>
        </div>
        @endforeach 
    </div>

</div>
@endsection