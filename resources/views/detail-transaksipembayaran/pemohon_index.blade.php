@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Detail Transaksi Pembayaran</h2>
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
            <th>ID Transaksi</th>
            <th>No. Ruangan</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Harga/bulan</th>
            <th width="250px"class="text-center">Aksi</th>
        </tr>            
        </thead>
        <tbody>
        @php
        $no=1;
        @endphp
        @foreach ($detail_transaksi_pembayaran as $tp)
        <tr>
            <td class="text-center">{{ $no++ }}</td>
            <td>{{ $tp->id_transaksi_pembayaran }}</td>
            <td>{{ }}</td>
            <td>{{ $tp->bulan }}</td>
            <td>{{ $tp->tahun }}</td>
            <td>{{ $tp->harga }}</td>

            <td class="text-center">
                <form action="{{ route('transaksipembayaran.destroy',$tp->id_detail_transaksi_pembayaran) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('detail-transaksipembayaran.show',$tp->id_detail_transaksi_pembayaran) }}">Tampil</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('detail-transaksipembayaran.edit',$tp->id_detail_transaksi_pembayaran) }}">Ubah</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach            
        </tbody>

    </table>
 
    {!! $detail_transaksi_pembayaran->links() !!}    
</div>

</div>
 
@endsection