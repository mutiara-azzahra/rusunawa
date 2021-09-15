@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom: 20px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Tampilkan FAQ</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('posts.index') }}"> Kembali</a>
            </div>
        </div>
    </div>
 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pertanyaan</strong><br>
                {{ $post->title }}<br>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jawaban</strong><br>
                {{ $post->content }}<br>
            </div>
        </div>
    </div>
</div>
@endsection