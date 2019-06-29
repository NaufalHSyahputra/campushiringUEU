@extends('layouts.main')

@section('title', 'Campus Hiring - Master Lowongan')

@section('title-section', 'Master Lowongan')

@section('css')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
@endsection
@section('content')
<div class="card">
        <div class="card-header">
            <h4>@yield('title-section')</h4>
            <a href="#" class="ml-auto d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right" data-toggle="modal" data-target="#addModal">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Baru
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1" width="100%">
                    <thead>
                        <tr>
                            <th>Lowongan ID</th>
                            <th>Perusahaan</th>
                            <th>Title</th>
                            <th>Deskripsi</th>
                            <th>Status Aktif</th>
                            <th>Tanggal Aktif</th>
                            <th>Status Approval</th>
                            <th>Durasi Lowongan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('modal')
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('admin.master.lowongan.save') }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="title">Perusahaan</label>
                            <select name="perusahaan_id" id="perusahaan_id" class="form-control">
                                @foreach ($prs as $pr)
                                    <option value="{{ $pr->perusahaan_id }}">{{ $pr->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="is_active">Status Aktif</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="active_date">Tanggal Aktif</label>
                            <input type="text" class="form-control" name="active_date">
                        </div>
                        <div class="form-group">
                            <label for="is_approved">Status Aktif</label>
                            <select name="is_approved" id="is_approved" class="form-control">
                                <option value="1">Approved</option>
                                <option value="0">Menunggu Approval</option>
                                <option value="-1">Rejected</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="active_date">Tanggal Approval</label>
                            <input type="text" class="form-control" name="active_date">
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
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('admin.master.lowongan.update') }}">
                    <input type="hidden" name="lowongan_id" id="lowongan_id_edit" value="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Perubahan Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                                <label for="title">Perusahaan</label>
                                <select name="perusahaan_id" id="perusahaan_id_edit" class="form-control">
                                    @foreach ($prs as $pr)
                                        <option value="{{ $pr->perusahaan_id }}">{{ $pr->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title_edit">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea id="deskripsi_edit" name="deskripsi" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="is_active">Status Aktif</label>
                                <select name="is_active" id="is_active_edit" class="form-control">
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="active_date">Tanggal Aktif</label>
                                <input type="text" class="form-control" name="active_date" id="active_date_edit">
                            </div>
                            <div class="form-group">
                                <label for="is_approved">Status Aktif</label>
                                <select name="is_approved" id="is_approved_edit" class="form-control">
                                    <option value="1">Approved</option>
                                    <option value="0">Menunggu Approval</option>
                                    <option value="-1">Rejected</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="active_date">Tanggal Approval</label>
                                <input type="text" class="form-control" name="active_date" id="active_date_edit">
                            </div>
                            <div class="form-group">
                                <label for="duration">Durasi</label>
                                <select name="duration" id="duration_edit" class="form-control">
                                    <option value="2">2 Minggu</option>
                                    <option value="4">1 Bulan</option>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script>
$('#deskripsi').summernote();
$('#deskripsi_edit').summernote();
$('#table-1').dataTable({
    serverSide: true,
    processing: true,
    responsive: true,
    ajax: "{{ route('admin.master.lowongan.getdata') }}",
    columns: [{
            data: 'lowongan_id',
            name: 'lowongan_id'
        },
        {
            data: 'perusahaan_id',
            name: 'perusahaan_id'
        },
        {
            data: 'title',
            name: 'title'
        },
        {
            data: 'deskripsi',
            name: 'deskripsi'
        },
        {
            data: 'is_active',
            name: 'is_active'
        },
        {
            data: 'active_date',
            name: 'active_date'
        },
        {
            data: 'is_approved',
            name: 'is_approved'
        },
        {
            data: 'duration',
            name: 'duration'
        },
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        }
    ],
});
$(document).on("click", ".editbutton", function() {
    let data_id = $(this).attr('data-id');
    $.get('/admin/master/lowongan/get/' + data_id, function(data) {
        $("#doc_id_edit").val(data.doc_id);
        $('#doc_desc_edit').val(data.doc_desc);
        $('#is_mandatory_edit').val(data.is_mandatory);
        $("#editModal").modal('show');
    });
});
$(document).on("click", ".deletebutton", function() {
    let url = $(this).attr('data-url');
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Anda tidak dapat mengembalikan data ini jika sudah dihapus',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak',
    }).then((result) => {
        if (result.value) {
            window.location.href = url;
        }
    })
});
</script>
@endsection

