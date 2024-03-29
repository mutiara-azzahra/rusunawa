@extends('layouts.admin')

@section('content')
<div class="container" style="padding: 20px; padding-bottom:30px;">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                @if(Auth::user()->id_role == 1)
                <h2> Data Pemohon: {{ $pemohon->nama_kepala_keluarga }}</h2>
                @else
                <h2> Data Penghuni: {{ $pemohon->nama_kepala_keluarga }}</h2>
                @endif
            </div>
            <div class="float-right">
                <a class="btn btn-success btn-secondary" href="{{ route('beranda') }}"><i class="fas fa-arrow-left"></i>  Kembali</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card" style="padding: 20px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama Pemohon</strong><br>
                            {{ $pemohon->nama_kepala_keluarga }}<br>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>NIK</strong><br>
                            {{ $pemohon->nik_kepala_keluarga }}<br>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Pekerjaan</strong><br>
                            {{ $pemohon->pekerjaan_kepala_keluarga }}<br>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Alamat</strong><br>
                            {{ $pemohon->alamat }}<br>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Jumlah Anggota Keluarga</strong><br>
                            {{ $pemohon->jumlah_anggota_keluarga }} orang<br>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Status Pengajuan</strong><br>
                            {{ $pemohon->status_pengajuan }}<br>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Tanggal Pengajuan</strong><br>
                            {{ Carbon\carbon::parse($pemohon->created_at)->translatedFormat('d F Y') }}<br>
                        </div>
                    </div>
                </div>    
            </div>
            <div class="row">
                @if(Auth::check())
                    @if(Auth::user()->id_role == 1)
                        @if($pemohon->status_pengajuan != 'diverifikasi')
                        <form action="{{Route('pemohon.verifikasi',$pemohon->id_pemohon)}}" method="get" id="form_verification"></form>
                        <a class="btn btn-success btn-md m-2" onclick="verifikasi_permohonan('{{$pemohon->id_pemohon}}')" ><i class="fas fa-check-circle"></i> Verifikasi Pengajuan</a>
                        
                        <form action="{{Route('pemohon.tolak',$pemohon->id_pemohon)}}" method="get" id="form_tolak"></form>
                        <a class="btn btn-danger btn-md m-2" onclick="tolak_permohonan('{{$pemohon->id_pemohon}}')" ><i class="fas fa-times-circle"></i> Tolak Pengajuan</a>
                        @else
                        @endif
                    @endif
                @endif                
            </div>

        </div>

        <div class="col-lg-6">
            <div class="col-lg-12">
                <div class="card" style="padding: 30px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Gedung</strong><br>
                            @if($pemohon->id_ruangan != null )
                            {{ $pemohon->ruangan->lantai->gedung->nama_gedung}}<br>

                            @else
                            <span class="badge badge-warning">Belum Pilih</span><br>

                            @endif
                        </div>   
                    </div>
                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Lantai</strong><br>
                            @if($pemohon->id_lantai != null )
                            Lantai {{ $pemohon->ruangan->lantai->lantai}}<br>

                            @else
                            <span class="badge badge-warning">Belum Pilih</span><br>

                            @endif
                        </div>
                    </div> --}}
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Ruangan</strong><br>
                            @if($pemohon->id_ruangan != null )
                            Nomor {{ $pemohon->ruangan->no_ruangan}}<br>

                            @else
                            <span class="badge badge-warning">Belum Pilih</span><br>

                            @endif
                        </div>
                    </div>
                    @if($pemohon->id_ruangan == null )
                    <div class="col-lg-12">
                        <div class="float-right">
                            <a class="btn btn-success btn-sm btn-secondary" href="{{ Route('pemohon.pilihrusun',$g->id_gedung) }}"><i class="fas fa-building"></i>  Pilih Ruangan</a>
                        </div>
                    </div>
                    @else

                    @endif          
                </div>
            </div> 

            <div class="col-lg-12">
                <div class="card" style="padding: 30px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Foto KTP</strong><br>
                            @if($pemohon->foto_ktp != null )
                            <a href="{{asset('/storage/lampiran_pemohon/'.$pemohon->foto_ktp)}}" class="btn btn-success btn-sm" target="__blank"><i class="fas fa-paperclip"></i> Lengkap
                            </a>
                                                      

                            @else
                            <span class="badge badge-warning">Belum Lengkap</span><br>

                            @endif
                        </div>

                        <div class="form-group">
                            <strong>Foto Akta Nikah</strong><br>
                            @if($pemohon->foto_akta_nikah != null )
                            <a href="{{asset('/storage/lampiran_pemohon/'.$pemohon->foto_akta_nikah)}}" class="btn btn-success btn-sm" target="__blank"><i class="fas fa-paperclip"></i> Lengkap</a>  

                            @else
                            <span class="badge badge-warning">Belum Lengkap</span><br>

                            @endif
                        </div>

                        <div class="form-group">
                            <strong>Foto Surat Keterangan Penghasilan</strong><br>
                            @if($pemohon->foto_surat_keterangan_penghasilan != null )
                            <a href="{{asset('/storage/lampiran_pemohon/'.$pemohon->foto_surat_keterangan_penghasilan)}}" class="btn btn-success btn-sm" target="__blank"><i class="fas fa-paperclip"></i> Lengkap</a>  

                            @else
                            <span class="badge badge-warning">Belum Lengkap</span><br>

                            @endif
                        </div>

                        <div class="form-group">
                            <strong>Foto KTP</strong><br>
                            @if($pemohon->foto_anggota_keluarga != null )
                            <a href="{{asset('/storage/lampiran_pemohon/'.$pemohon->foto_anggota_keluarga)}}" class="btn btn-success btn-sm" target="__blank" ><i class="fas fa-paperclip"></i> Lengkap</a>  

                            @else
                            <span class="badge badge-warning">Belum Lengkap</span><br>

                            @endif
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="float-right">
                                @if($pemohon->foto_akta_nikah == null )
                                <a class="btn btn-success" href="" data-toggle="modal"  data-target="#dokumen"><i class="fas fa-paperclip"></i> Lengkapi Dokumen</a>  

                                @else
                                @endif                                 
                            </div>
                        </div>

                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="dokumen">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    @if($pemohon->foto_anggota_keluarga == null )
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 m-3">
                                        <h4>Lengkapi Dokumen</h4>
                                    </div>

                                    <div class="card m-3" style="padding:10px;">
                                        <form action="{{ route('pemohon_user.update', $pemohon->id_pemohon)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <strong>Foto KTP/Surat Keterangan Domisili</strong>
                                                    <input type="file" name="foto_ktp" class="form-control-file" id="exampleFormControlFile1">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <strong>Foto Akta Nikah</strong>
                                                    <input type="file" name="foto_akta_nikah" class="form-control-file" id="exampleFormControlFile1">
                                                </div>
                                            </div>                    
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <strong>Foto Surat Keterangan Penghasilan </strong>
                                                    <input type="file" name="foto_surat_keterangan_penghasilan" class="form-control-file" id="exampleFormControlFile1">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <strong>Foto Anggota Keluarga</strong>
                                                    <input type="file" name="foto_anggota_keluarga" class="form-control-file" id="exampleFormControlFile1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="padding-right: 10px; margin: 0 !important">
                                            <div class="float-right">
                                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Dokumen</button>
                                            </div>
                                        </div>
                                    
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <strong>Maaf!</strong> Ada yang salah.<br><br>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        </form>
                                    </div>

                                    @endif

                                </div>
                            </div>
                        </div>

                    </div>
                </div>        
            </div>           
        </div>
    </div>

</div>

    <!-- Lightbox Script -->
    <script>
        let verifikasi_permohonan = (id_pemohon) =>{

                console.log(id_pemohon)
                Swal.fire({
                    title: 'Verifikasi permohonan ini?',
                    text:  "menghapus notifikasi" ,
                    showCancelButton: true,
                    confirmButtonColor: 'green' ,
                    cancelButtonColor: '#187bcd' ,
                    confirmButtonText: 'Verifikasi' ,
                    cancelButtonText: 'Batal' ,
                    reverseButtons: false
                    }).then((result) => {
                        if (result.value) {
                            $('#form_verification').submit();
                        }

                })
            }

            let tolak_permohonan = (id_pemohon) =>{

                console.log(id_pemohon)
                Swal.fire({
                    title: 'Tolak permohonan ini?',
                    text:  "" ,
                    showCancelButton: true,
                    confirmButtonColor: 'red' ,
                    cancelButtonColor: '#187bcd' ,
                    confirmButtonText: 'Tolak' ,
                    cancelButtonText: 'Batal' ,
                    reverseButtons: false
                    }).then((result) => {
                        if (result.value) {
                            $('#form_tolak').submit();
                        }

                })
            }

        $(document).on("click", '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });

        let getRuangan = (id) =>{
            let id_ruangan = $(`#input_ruangan${id}`).val();
            axios.get('/api/ruangan/'+ id_ruangan)
            .then(function (response){
                
            console.log(response.data.harga_ruangan)
            $(`#harga${id}`).text(`Rp. ${response.data.harga_ruangan}`)
            $(`#id_ruangan${id}`).val(`${response.data.id_ruangan}`)
            })
            .catch(function (error) {
                console.log(error);
            })
        }
        
    
    </script>
@endsection