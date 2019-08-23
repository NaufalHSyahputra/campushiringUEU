@extends('layouts.main')

@section('title', 'Campus Hiring - Detail Lowongan')

@section('title-section', 'Detail Lowongan')

@section('css')

@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary float-left">
            @yield('title-section')
        </h6>
    </div>
    <div class="card-body">
        <ul class="nav nav-pills nav-fill" id="myTab3" role="tablist">
            @php
                if(session('nav-link')) {
                    if(session('nav-link') == 2){
                        $active1 = "";
                        $active2 = "active";
                        $active3 = "";
                        $show = "show ";
                        $show1 = " ";
                    } elseif(session('nav-link') == 3){
                        $active1 = "";
                        $active2 = "";
                        $active3 = "active";
                        $show = "show ";
                        $show1 = " ";
                    }
                } else {
                    $active1 = "active";
                    $active2 = "";
                    $active3 = "";
                    $show1 = "show ";
                    $show = "";
                }
            @endphp
            <li class="nav-item">
                <a class="nav-link <?= $active1 ?>" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Ringkasan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $active2 ?>" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Pelamar</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link <?= $active3 ?>" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home4" aria-selected="false">Pengaturan</a>
                </li>
        </ul>
        <div class="tab-content" id="myTabContent2">
        <div class="tab-pane fade <?= $show1.$active1 ?>" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                <table class="table table-bordered">
                        <tr>
                                <th colspan="2" style="text-align:center;"><a href="{{ route("perusahaan.lowongan.showEdit", $lowongan->lowongan_id) }}" class="btn btn-info btn-block">Ubah Lowongan</th>
                            </tr>
                            <tr>
                                <td>Judul</td>
                                <td>{{ $lowongan->title }}</td>
                            </tr>

                            <tr>
                                <td>Tanggal Aktif</td>
                                <td>{{ $lowongan->active_date }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Expired</td>
                                <td>{{ $lowongan->expired_date }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{  $lowongan->is_approve == 1 ? "Sudah di approve" : "Belum di Approve" }} - {{  $lowongan->is_active == 1 ? "Aktif" : "Tidak Aktif" }}</td>
                            </tr>
                      </table>
        </div>
        <div class="tab-pane fade <?= $show.$active2 ?>" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <td>Nama</td>
                            <td>Email</td>
                            <td>Nomor Telp</td>
                            <td>Tanggal Melamar</td>
                            <td>Dokumen</td>
                            <td>Status</td>
                            <td>Isi Respon</td>
                            <td>Tanggal Respon</td>
                            <td>Aksi</td>
                        </thead>
                        <tbody>
                        @foreach ($pelamars as $pelamar)
                            <tr>
                                <td>{{ $pelamar->tblmahasiswa->tblmahasiswa_detail->nama }}</td>
                                <td>{{ $pelamar->tblmahasiswa->tblmahasiswa_detail->email }}</td>
                                <td>{{ $pelamar->tblmahasiswa->tblmahasiswa_detail->nohp }}</td>
                                <td>{{ $pelamar->apply_dates }}</td>
                                <td><button class="btn btn-success docButton" data-id="{{ $pelamar->mahasiswa_id }}">Detail</button></td>
                                <td>{{ $pelamar->is_respond == 1 ? "Sudah direspon" : "Belum direspon" }}</td>
                                <td>{{ $pelamar->respond_notes }}</td>
                                <td>{{ $pelamar->respond_date }}</td>
                                <td><button class="btn btn-success responButton" data-id="{{ $pelamar->low_mhs_id }}">Respon</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table></div>
                </div>
                </div>
            </div>
            <div class="tab-pane fade <?= $show1.$active3 ?>" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                    <table class="table table-bordered">
                            <tr>
                                <td><button type="button" class="btn btn-warning btn-block btn-lg aktifButton" {{ $lowongan->expired_date < date("Y-m-d h:i:sa") ? "disabled" : "" }}>Ubah Status Aktif</button></td>
                                <td><button type="button" class="masaBerlaku btn btn-warning btn-block btn-lg" {{ $lowongan->expired_date > date("Y-m-d h:i:sa") ? "disabled" : "" }}>Tambah Masa Berlaku</button></td>
                            </tr>
                      </table>
                    </div>
                    </div>
                </div>
            </div>
@endsection
@section('modal')
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dokumen Pelamar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <th>Kategori Dokumen</th>
                            <th>Nama File</th>
                        </thead>
                        <tbody id="tablex">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="responModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('perusahaan.lowongan.saveRespon') }}">
                    <input type="hidden" name="low_mhs_id" id="low_mhs_id_edit" value="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Respon Pelamar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="respond_notes">Catatan Respond</label>
                            <textarea name="respond_notes" id="respond_notes" class="form-control"  cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="masaBerlakuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('perusahaan.lowongan.tambahMasaBerlaku') }}" enctype="multipart/form-data">
                        <input type="hidden" name="low_mhs_id" id="low_mhs_id_edit" value="">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Masa Berlaku Lowongan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-info">Silahkan unggah surat permohonan untuk menambah masa berlaku lowongan</div>
                            @csrf
                            <input type="hidden" name="lowongan_id" value="{{ $lowongan->lowongan_id }}">
                            <div class="form-group">
                                    <label for="surat_peromohonan">Surat Permohonan</label>
                                    <input type="file" class="form-control" id="file_sp" name="file_sp">
                            </div>
                            <div class="form-group">
                                    <label for="duration">Durasi</label>
                                    <select name="duration" id="duration" class="form-control">
                                        <option value="2">2 Minggu</option>
                                        <option value="4">1 Bulan</option>
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="statusAktifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('perusahaan.lowongan.updateStatus') }}">
                            <input type="hidden" name="low_mhs_id" id="low_mhs_id_edit" value="">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ubah Status Aktif Lowongan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <input type="hidden" name="lowongan_id" value="{{ $lowongan->lowongan_id }}">
                                <div class="form-group">
                                    <label for="is_active">Status Lowongan</label>
                                    <select name="is_active" id="is_active" class="form-control">
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection
@section('js')
<script>
$(document).on('click', '.docButton', function () {
    let id = $(this).data("id");
    $("#tablex").empty();
    $.get('/perusahaan/lowongan/getDokumen/'+id,function(datax){
        $.each(datax, function(key, value){
            $("#tablex").append("<tr><td>"+value.doc_desc+"</td><td><a href='/document/mahasiswa/"+value.doc_file+"'>"+value.doc_file+"</a></td></tr>")
        });
    });
    $("#editModal").modal('show');
});
$(document).on('click', '.responButton', function () {
    let id = $(this).data("id");
    $("#low_mhs_id_edit").val(id);
    $("#responModal").modal('show');
});
$(document).on('click', '.aktifButton', function() {
    $("#statusAktifModal").modal('show');
});
$(document).on('click', '.masaBerlaku', function() {
    $("#masaBerlakuModal").modal('show');
});
</script>
@endsection

