@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Transaksi Pembayaran</h2>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

<div class="card" style="padding: 20px;">
    <table class="table table-hover table-sm table-responsive bg-light" id="dataTable">
        <thead>
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Gedung</th>
            <th>Ruangan</th>
            <th>Nama Penghuni</th>
            <th width="250px"class="text-center">Aksi</th>
        </tr>            
        </thead>
        <tbody>
        @php
        $no=1;
        @endphp
        @foreach ($transaksi_pembayaran as $tp)
        <tr>
            <td class="text-center">{{ $no++ }}</td>
            <td>{{ $tp->ruangan->lantai->gedung->nama_gedung }}</td>
            <td>Nomor {{ $tp->ruangan->no_ruangan }}</td>
            <td>{{ $tp->pemohon->nama_kepala_keluarga }}</td>   
            <td class="text-center">
                <form action="{{ route('transaksipembayaran.destroy',$tp->id_transaksi_pembayaran) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('transaksipembayaran.show',$tp->id_transaksi_pembayaran) }}">Detail Pembayaran</a> 
                </form>
            </td>
        </tr>
        @endforeach            
        </tbody>

    </table>
 
    {!! $transaksi_pembayaran->links('pagination::bootstrap-4') !!}    
</div>

</div>
 
@endsection