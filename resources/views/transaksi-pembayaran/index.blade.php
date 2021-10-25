@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Transaksi Pembayaran</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('transaksi-pembayaran.filter') }}"><i class="fas fa-print"></i> Filter Tanggal - Cetak</a>
                <a class="btn btn-success" href="{{ route('transaksi-pembayaran.create') }}"><i class="fas fa-plus"></i> Tambah Transaksi Baru</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

<div class="card" style="padding: 20px;">
    <table class="table table-hover table-bordered bg-light" id="dataTable">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Penghuni</th>
            <th>Gedung</th>
            <th>Ruangan</th>
            <th class="text-center">Aksi</th>
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
                <form action="{{ route('transaksi-pembayaran.destroy',$tp->id_transaksi_pembayaran) }}" method="POST" id="form_delete">
 
                    <a class="btn btn-info btn-sm" href="{{ route('transaksi-pembayaran.show',$tp->id_transaksi_pembayaran) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tampil"><i class="fas fa-eye"></i></a>
                    <a class="btn btn-primary btn-sm" href="{{ route('transaksi-pembayaran.edit',$tp->id_transaksi_pembayaran) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah"><i class="fas fa-edit"></i></a>
 
                    @csrf
                    @method('DELETE')
 
                    <a type="submit" class="btn btn-danger btn-sm" onclick="Hapus('{{ $tp->id_transaksi_pembayaran }}')"><i class="fas fa-trash"></i></button>
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

@section('script')

<script>
    Hapus = (id_transaksi_pembayaran)=>{
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