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
                    <img src="{{ asset('rusunawa3.jpg') }}" class="card-img-top" style="height: 200px;">
                </div>
                <div class="col-lg-8" style="padding: 30px;">
                    <b>{{$g->nama_gedung}}</b>
                    <p class="card-text text-muted">{{$g->alamat_gedung}}</p>
                    <p class="card-text" style="color: red">@if($g->ruangan != null){{$g->ruangan->count()}} @else 0 @endif Ruangan Tersedia</p>
                    <a href="{{ route('pemohon.pilihruangan',$g->id_gedung)}}"  class="btn btn-success">Pilih Ruangan</a>
                </div>
            </div>
        </div>
        @endforeach 
    </div>

</div>
@endsection