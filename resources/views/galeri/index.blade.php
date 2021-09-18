@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding:20px; padding-bottom:30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Galeri</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('galeri.create') }}"> Tambah Galeri</a>
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
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Foto</th>
                        <th width="200px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                $no=1;
                @endphp
                @foreach ($galeri as $g)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $g->kategori}}</td>
                    <td>{{ $g->foto }}</td>
                    <td class="text-center">
                        <form action="{{ route('galeri.destroy',$g->id_galeri) }}" method="POST" id="form_delete">
        
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" data-target="#myModal">
                                <i class="nav-icon fas fa-info"></i>
                            </button> 
                            <a class="btn btn-primary btn-sm" href="{{ route('galeri.edit',$g->id_galeri) }}">Ubah</a>
                            <a class="btn btn-danger btn-sm" onclick="Hapus('{{$g->id_galeri}}')"> Hapus</a>

                            @csrf
                            @method('DELETE')
        
                        </form>
                    </td>
                </tr>
                </tbody>
                @endforeach
            </table>

            {!! $galeri->links('pagination::bootstrap-4') !!}

            <!-- Large modal -->


            {{-- <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="card m-3" style="padding: 10px;">
                        Test
                        </div>
                    </div>
                </div>
            </div>
            {!! $galeri->links() !!} --}}
    </div>
</div>
    
 
@endsection

@section('script')

<script>
    Hapus = (id_galeri)=>{
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