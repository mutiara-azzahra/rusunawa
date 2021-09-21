@extends('layouts.admin')
 
@section('content')
<div class="container" style="padding: 20px; padding-bottom: 30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Tipe Ruangan</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('tiperuangan.create') }}"><i class="fas fa-plus"></i> Tambah Tipe Ruangan</a>
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
            <th width="20px" class="text-center">No</th>
            <th class="text-center">Tipe Ruangan</th>
            <th width="250px"class="text-center">Aksi</th>
        </tr>    
        </thead>
        <tbody>
        @php
        $no=1;
        @endphp
        @foreach ($tipe_ruangan as $tr)
        <tr>
            <td class="text-center">{{ $no++ }}</td>
            <td>Tipe {{ $tr->tipe_ruangan }}</td>
            <td class="text-center">
                <form action="{{ route('tiperuangan.destroy',$tr->id_tipe_ruangan) }}" method="POST" id="form_delete">
 
                    <a class="btn btn-info btn-sm" href="{{ route('tiperuangan.show',$tr->id_tipe_ruangan) }}">Tampil</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('tiperuangan.edit',$tr->id_tipe_ruangan) }}">Ubah</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach            
        </tbody>
    </table>

    {!! $tipe_ruangan->links('pagination::bootstrap-4') !!}

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