@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Pilih Gedung</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success btn-secondary" href="{{ route('pemohon.index') }}"><i class="fas fa-arrow-left"></i>  Kembali</a>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        @foreach($gedung as $g)
        <div class="card">
            <div class="row">
                <div class="col-lg-4">
                    @if($g->galeri->isNotEmpty())
                    <img class="card-img-top" image src="{{asset('/storage/galeri/'.$g->galeri->first()->foto )}}" data-id="{{asset('/storage/galeri/'.$g->galeri )}}" alt="" width="100%" height="200px;">
                    @else
                    <img class="card-img-top" image src="{{asset('/building.jpg')}}" data-id="{{asset('/storage/galeri/no_image.jpg' )}}" alt="" width="100%" height="200px;">
                    @endif
                </div>
                <div class="col-lg-8" style="padding: 30px;">
                    <b>{{$g->nama_gedung}} {{$g->blok}}</b>
                    <p class="card-text text-muted">{{$g->alamat_gedung}}</p>
                    <p class="card-text" style="color: red">{{$ruangan->whereIn('id_lantai',$g->id_lantai)->where('status_ruangan','kosong')->count()}} Ruangan Tersedia</p>
                    <a href="{{ route('pemohon.pilihruangan',$g->id_gedung)}}"  class="btn btn-success">Pilih Ruangan</a>
                </div>
            </div>
        </div>
        @endforeach 
    </div>

</div>
@endsection