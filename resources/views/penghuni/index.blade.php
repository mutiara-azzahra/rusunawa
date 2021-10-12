@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Penghuni</h2>
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
                    <th width="20px">No</th>
                    <th>Nama</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status Penghuni</th>
                    <th width="250px"class="text-center">Aksi</th>
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
                    <td>{{ Carbon\carbon::parse($p->created_at)->format('d F Y') }}</td>
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
                        @if($p->status_permohonan == 'aktif')
                            <a class="btn btn-danger btn-sm" href="{{ route('pemohon.nonaktif',$p->id_pemohon) }}"> Nonaktifkan</a>
                        @else
                        @endif
                            <a class="btn btn-info btn-sm" href="{{ route('pemohon.show',$p->id_pemohon) }}"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-danger btn-sm" onclick="Hapus('{{$p->id_pemohon}}')"><i class="fas fa-trash"></i></a>
                            
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