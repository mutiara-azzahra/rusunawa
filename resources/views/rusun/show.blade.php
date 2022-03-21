@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2> Data Rusun</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('rusun.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>        
    </div>


    <div class="card" style="padding: 30px;">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Rusun</strong><br>
                    {{ $rusun->nama_rusun }}<br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat</strong><br>
                    {{ $rusun->alamat }}<br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Foto</strong><br>
                    {{ $rusun->foto }}<br>
                </div>
            </div>
        </div>
    </div>

    <div class="card" style="padding: 20px;">
        <table class="table table-hover table-bordered table-sm bg-light" id="dataTable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Gedung</th>
                        <th class="text-center">Blok</th>
                        <th class="text-center">Tipe Ruangan</th>
                        <th class="text-center">Jumlah Ruangan</th>
                        <th class="text-center">Status Gedung</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @php
                $no=1;
                @endphp
                @foreach ($gedung as $g)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $g->nama_gedung }}</td>
                    <td>
                    @if($g->blok == null)
                    -
                    @else
                    {{ $g->blok}}
                    @endif
                    </td>
                    <td>{{ $g->tipe_ruangan->tipe_ruangan }}</td>
                    <td>{{ $g->jumlah_ruangan }}</td>
                    <td>
                    @if($g->status_gedung == 'Masih Tersedia')
                    <div><span class="badge badge-success">Masih Tersedia</span></div>

                    @elseif($g->status_gedung == 'Penuh')
                    <div><span class="badge badge-warning">Penuh</span></div>

                    @endif
                    </td>
                    <td class="text-center">
                        <form action="{{ route('gedung.destroy',$g->id_gedung) }}" method="POST" id="form_delete{{$g->id_gedung}}">
        
                            <a class="btn btn-info btn-sm" href="{{ route('gedung.show',$g->id_gedung) }}"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-primary btn-sm" href="{{ route('gedung.edit',$g->id_gedung) }}"><i class="fas fa-edit"></i></a>
                            
                            @csrf
                            @method('DELETE')
                            
                            <a class="btn btn-danger btn-sm" onclick="Hapus('{{$g->id_gedung}}')"><i class="fas fa-trash"></i></a>
                        </form>
                    </td>
                </tr>
                </tbody>
                @endforeach
            </table>
    </div>
    
</div>
@endsection