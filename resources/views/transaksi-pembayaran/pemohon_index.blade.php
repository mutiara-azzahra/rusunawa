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
   <div class="card-body">
    <table class="table table-hover table-bordered bg-light" id="dataTable">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Penghuni</th>
            <th>Gedung</th>
            <th>Ruangan</th>
            <th class="text-center">Detail</th>
        </tr>            
        </thead>
        <tbody>
        @php
        $no=1;
        @endphp
        @foreach ($transaksi_pembayaran as $tp)
        <tr>
            <td class="text-center">{{ $no++ }}</td>
            <td>{{ $tp->pemohon->nama_kepala_keluarga }}</td>
            <td>{{ $tp->ruangan->lantai->gedung->nama_gedung }}</td>
            <td>Nomor {{ $tp->ruangan->no_ruangan }}</td>
            <td class="text-center"> 
                <a class="btn btn-info btn-sm" href="{{ route('detail-transaksipembayaran.show',$tp->id_transaksi_pembayaran) }}">Detail Bulan</a> 
            </td>
        </tr>
        @endforeach            
        </tbody>

    </table>
 
    {!! $transaksi_pembayaran->links('pagination::bootstrap-4') !!}    
   </div>
</div>

</div>
 
@endsection