@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Kota/Kabupaten</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('kota.create') }}"><i class="fas fa-plus"></i> Tambah Data</a>
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
                        <th>No</th>
                        <th>Nama Kota/Kabupaten</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($kota as $k)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td> {{ $k->nama_kota }}</td>
                        <td class="text-center">
                            <form action="{{ route('kota.destroy',$k->id_kota) }}" method="POST" id="form_delete{{$k->id_kota}}">            
                                <a class="btn btn-primary btn-sm" href="{{ route('kota.edit',$k->id_kota) }}"><i class="fas fa-edit"></i> Ubah</a>
            
                                @csrf
                                @method('DELETE')
            
                                <a class="btn btn-danger btn-sm" onclick="Hapus('{{$k->id_kota}}')"><i class="fas fa-trash"></i> Hapus</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
            {!! $kota->links('pagination::bootstrap-4') !!}
    </div>
        
</div> 
@endsection

@section('script')

<script>
    Hapus = (id_kota)=>{
        Swal.fire({
            title: 'Apa anda yakin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data'
            }).then((result) => {
                if (result.value) {
                    $(`#form_delete${id_kota}`).submit();
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