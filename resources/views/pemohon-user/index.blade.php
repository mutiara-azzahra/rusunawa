@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data pemohon</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('pemohon.create') }}"> Tambah Pemohon</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
 
    <div class="card" style="padding: 20px;">
            <table class="table table-hover table-sm bg-light" id="dataTable">
                <thead>
                <tr>
                    <th width="20px" class="text-center">No</th>
                    <th width="20px" class="text-center">Nama</th>
                    <th width="20px" class="text-center">Tanggal Pengajuan</th>
                    <th width="20px" class="text-center">Status Pengajuan</th>
                    <th width="20px" class="text-center">Keterangan</th>
                    <th width="150px"class="text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php
                $no=1;
                @endphp
                @foreach ($pemohon as $p)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $p->nama_kepala_keluarga }}</td>
                    <td>{{ $p->tanggal_pengajuan }}</td>
                    <td>{{ $p->status_pengajuan }}</td>
                    <td>{{ $p->keterangan }}</td>
                    <td class="text-center"> 
                        <form action="{{Route('pemohon.destroy',$p->id_pemohon)}}" method="POST" id="form_delete">
                        @csrf 
                        @method('DELETE')
                        </form>

                            <a class="btn btn-info btn-sm" href="{{ route('pemohon.show',$p->id_pemohon) }}"> Tampil</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('pemohon.edit',$p->id_pemohon) }}"> Ubah</a>
                            <a class="btn btn-danger btn-sm" onclick="Hapus('{{$p->id_pemohon}}')"> Hapus</a>
                            
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
    </div>
 
    {!! $pemohon->links() !!}
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