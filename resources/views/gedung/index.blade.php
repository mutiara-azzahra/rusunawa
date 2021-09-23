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

    <div class="card" style="padding: 20px;">
        <table class="table table-hover table-bordered table-sm bg-light" id="dataTable">
                <thead>
                    <tr>
                        <th width="20px" class="text-center">No</th>
                        <th class="text-center">Nama Gedung</th>
                        <th width="60px" class="text-center">Tipe Ruangan</th>
                        <th width="60px" class="text-center">Jumlah Ruangan</th>
                        <th class="text-center">Status Gedung</th>
                        <th width="200px" class="text-center">Aksi</th>
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
                    <td>{{ $g->tipe_ruangan->tipe_ruangan }}</td>
                    <td>{{ $g->jumlah_ruangan }}</td>
                    <td>{{ $g->status_gedung }}</td>
                    <td class="text-center">
                        <form action="{{ route('gedung.destroy',$g->id_gedung) }}" method="POST" id="form_delete">
        
                            <a class="btn btn-info btn-sm" href="{{ route('gedung.show',$g->id_gedung) }}">Tampil</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('gedung.edit',$g->id_gedung) }}">Ubah</a>
                            <a class="btn btn-danger btn-sm" onclick="Hapus('{{$g->id_gedung}}')" data-action="{{ route('gedung.destroy',$g->id_gedung) }}" id="form_delete"> Hapus</a>

                            @csrf
                            @method('DELETE')
        
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
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
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