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
            <th>Status Pembayaran</th>
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
            <td>{{ $tp->id_gedung }}</td>
            <td>{{ $tp->id_ruangan }}</td>
            <td>{{ $tp->id_pemohon }}</td>
            <td></td>         
            <td class="text-center">
                <form action="{{ route('transaksipembayaran.destroy',$tp->id_transaksi_pembayaran) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('transaksipembayaran.show',$tp->id_transaksi_pembayaran) }}">Tampil</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('transaksipembayaran.edit',$tp->id_transaksi_pembayaran) }}">Ubah</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach            
        </tbody>

    </table>
 
    {!! $transaksi_pembayaran->links() !!}    
</div>

</div>
 
@endsection