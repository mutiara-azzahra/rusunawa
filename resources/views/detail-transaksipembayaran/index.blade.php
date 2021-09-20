@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Detail Transaksi Pembayaran</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('transaksipembayaran.create') }}"><i class="fas fa-plus"></i> Tambah Data</a>
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
            <th>Nama Penghuni</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Harga</th>
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
            <td>{{ $tp->id_pemohon }}</td>
            <td>{{ $tp->bulan }}</td>
            <td>{{ $tp->tahun }}</td>
            <td>{{ $tp->harga }}</td>
            <td>{{ $tp->created_at}}</td>
            <td></td>                  
            <td></td>         
            <td class="text-center">
                <form action="{{ route('transaksipembayaran.destroy',$tp->id_transaksi_pembayaran) }}" method="POST" id="form_delete">
 
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

@section('script')

<script>
    Hapus = (id_pemohon)=>{
        Swal.fire({
            title: 'Apa anda yakin menghapus data ini?',
            text:  "menghapus notifikasi" ,
            showCancelButton: true,
            confirmButtonColor: '#3085d6' ,
            cancelButtonColor: 'red' ,
            confirmButtonText: 'Hapus Data' ,
            cancelButtonText: 'Batal' ,
            reverseButtons: false
            }).then((result) => {
                if (result.value) {
                    $('#form_delete').submit();
                }

        })
    }
</script>
@endsection