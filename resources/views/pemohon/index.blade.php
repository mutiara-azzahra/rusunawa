@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Pemohon</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('pemohon_admin.create') }}"><i class="fas fa-plus"></i> Tambah Pemohon</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
 
    <div class="card" style="padding: 20px;">
            <table class="table table-bordered table-hover table-sm bg-light" id="dataTable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status Pengajuan</th>
                    <th>Status Permohonan</th>
                    <th class="text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php
                $no=1;
                @endphp
                @foreach ($pemohon as $p)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $p->nama_kepala_keluarga }}</td>
                    <td>{{ Carbon\carbon::parse($p->created_at)->translatedFormat('d F Y') }}</td>
                    <td>
                        @if($p->status_pengajuan == 'diverifikasi')
                        <div><span class="badge badge-success">Diverifikasi</span></div>
          
                        @elseif($p->status_pengajuan =='diproses')
                        <div><span class="badge badge-warning">Diproses</span></div>
          
                        @elseif($p->status_pengajuan =='ditolak')
                        <div><span class="badge badge-danger">Ditolak</span></div>
          
                        @elseif($p->status_pengajuan =='belum lengkap')
                        <div><span class="badge badge-info">Belum Lengkap</span></div>
                        
                        @endif
                    </td>
                    <td>
                        @if($p->status_permohonan == 'aktif')
                        <div><span class="badge badge-success">Aktif</span></div>
          
                        @elseif($p->status_permohonan =='tidak aktif')
                        <div><span class="badge badge-danger">Tidak Aktif</span></div>
                        @endif
                    </td>
                    <td class="text-center"> 
                        <form action="{{Route('pemohon.destroy',$p->id_pemohon)}}" method="POST" id="form_delete">
                        @csrf 
                        @method('DELETE')
                        </form>
                            <a class="btn btn-info btn-sm" href="{{ route('pemohon.show',$p->id_pemohon) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tampil"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-danger btn-sm" onclick="Hapus('{{$p->id_pemohon}}')" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"><i class="fas fa-trash"></i></a>   
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
    </div>
 
    {!! $pemohon->links('pagination::bootstrap-4') !!}
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
            confirmButtonText: 'hapus data' ,
            cancelButtonText: 'batal' ,
            reverseButtons: false
            }).then((result) => {
                if (result.value) {
                    $('#form_delete').submit();
                }

        })
    }
</script>
@endsection