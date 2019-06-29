@extends('layouts.main')

@section('title', 'Campus Hiring - Master Perusahaan Request')

@section('title-section', 'Master Perusahaan Request')

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
                        <table class="table table-striped table-responsive" id="table-1" width="100%">
                    <thead>
                        <tr>
                            <th>Perusahaan Request ID</th>
                            <th>Perusahaan</th>
                            <th>Tanggal Request</th>
                            <th>Approval</th>
                            <th>Diapprove oleh</th>
                            <th>Tanggal Approve</th>
                            <th>Catatan</th>
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
                <form method="POST" action="{{ route('admin.master.perusahaan.request.save') }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="perusahaan_id">Perusahaan</label>
                            <select name="perusahaan_id" id="perusahaan_id" class="form-control">
                                <option value="">--Pilih Perusahaan--</option>
                                @foreach ($prs as $pr)
                                    <option value="{{ $pr->perusahaan_id }}">{{ $pr->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                                <label for="req_date">Tanggal Request</label>
                                <input type="date" class="form-control" name="req_date">
                            </div>
                        <div class="form-group">
                                <label for="perusahaan_nama">Status</label>
                                <select name="is_approved" id="is_approved" class="form-control">
                                    <option value="1">Approved</option>
                                    <option value="0">Pending</option>
                                    <option value="-1">Rejected</option>
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="approved_by">Diapprove oleh</label>
                            <input type="text" class="form-control" name="approved_by">
                        </div>
                        <div class="form-group">
                            <label for="approved_date">Tanggal Approve</label>
                            <input type="text" class="form-control" name="approved_date">
                        </div>
                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <textarea name="notes" id="notes" cols="30" rows="10" class="form-control"></textarea>
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
                <form method="POST" action="{{ route('admin.master.perusahaan.request.update') }}">
                    <input type="hidden" name="prs_req_id" id="prs_req_id_edit" value="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Perubahan Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                                <label for="req_date">Tanggal Request</label>
                                <input type="text" class="form-control" name="req_date" id="req_date_edit">
                            </div>
                            <div class="form-group">
                                <label for="perusahaan_id">Perusahaan</label>
                                <select name="perusahaan_id" id="perusahaan_id_edit" class="form-control">
                                    <option value="">--Pilih Perusahaan--</option>
                                    @foreach ($prs as $pr)
                                        <option value="{{ $pr->perusahaan_id }}">{{ $pr->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                    <label for="perusahaan_nama">Status</label>
                                    <select name="is_approved" id="is_approved_edit" class="form-control">
                                        <option value="1">Approved</option>
                                        <option value="0">Pending</option>
                                        <option value="-1">Rejected</option>
                                    </select>
                                </div>
                            <div class="form-group">
                                <label for="approved_by">Diapprove oleh</label>
                                <input type="text" class="form-control" name="approved_by" id="approved_by_edit">
                            </div>
                            <div class="form-group">
                                <label for="approved_date">Tanggal Approve</label>
                                <input type="text" class="form-control" name="approved_date" id="approved_date_edit">
                            </div>
                            <div class="form-group">
                                <label for="notes">Notes</label>
                                <textarea name="notes" id="notes_edit" cols="30" rows="10" class="form-control"></textarea>
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
<script>
$('#table-1').dataTable({
    serverSide: true,
    processing: true,
    responsive: true,
    ajax: "{{ route('admin.master.perusahaan.request.getdata') }}",
    columns: [{
            data: 'prs_req_id',
            name: 'tblperusahaan_request.prs_req_id'
        },
        {
            data: 'nama',
            name: 'tblperusahaan.nama'
        },
        {
            data: 'req_date',
            name: 'tblperusahaan_request.req_date'
        },
        {
            data: 'is_approved',
            name: 'tblperusahaan_request.is_approved'
        },
        {
            data: 'approved_by',
            name: 'tblperusahaan_request.approved_by'
        },
        {
            data: 'approved_date',
            name: 'tblperusahaan_request.approved_date'
        },
        {
            data: 'notes',
            name: 'tblperusahaan_request.notes'
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
    $.get('/admin/master/perusahaan/request/get/' + data_id, function(data) {
        $("#prs_req_id_edit").val(data.prs_req_id);
        $("#perusahaan_id_edit").val(data.perusahaan_id);
        $("#req_date_edit").val(data.req_date);
        $('#is_approved_edit').val(data.is_approved);
        $("#approved_date_edit").val(data.approved_date);
        $("#approved_by_edit").val(data.approved_by);
        $('#notes_edit').val(data.notes);
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



