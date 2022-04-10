@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding:20px; padding-bottom:30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Gedung</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('gedung.create') }}"><i class="fas fa-plus"></i> Tambah Gedung</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    @if ($message = Session::get('warning'))
    <div class="alert alert-warning">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="card" style="padding: 20px;">
        <table class="table table-hover table-bordered table-sm bg-light" id="dataTable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Gedung</th>
                        <th class="text-center">Rusun</th>
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
                    <td>{{ $g->rusun->nama_rusun }}</td>
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
        
                            <a class="btn btn-info btn-sm" href="{{ route('gedung.show',$g->id_gedung) }}"><i class="fas fa-eye"></i> Tampil</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('gedung.edit',$g->id_gedung) }}"><i class="fas fa-edit"></i> Ubah</a>
                            
                            @csrf
                            @method('DELETE')
                            
                            <a class="btn btn-danger btn-sm" onclick="Hapus('{{$g->id_gedung}}')"><i class="fas fa-trash"></i> Hapus</a>
                        </form>
                    </td>
                </tr>
                </tbody>
                @endforeach
            </table>

            {!! $gedung->links('pagination::bootstrap-4') !!}
    </div>
</div>
    
 
@endsection

@section('script')

<script>
    Hapus = (id_gedung)=>{
        Swal.fire({
            title: 'Apa anda yakin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data'
            }).then((result) => {
                if (result.value) {
                    $(`#form_delete${id_gedung}`).submit();
                }
        })
    }
</script>

<script>
    $('#myModal').modal({
  keyboard: false
})
</script>
@endsection