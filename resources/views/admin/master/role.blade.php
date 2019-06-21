@extends('layouts.main')

@section('title', 'Campus Hiring - Master Role')

@section('title-section', 'Master Role')

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
                            <th>Role ID</th>
                            <th>Nama Role</th>
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
                <form method="POST" action="{{ route('admin.master.role.save') }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="role_desc">Nama Role</label>
                            <input type="text" class="form-control" name="role_desc">
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
                <form method="POST" action="{{ route('admin.master.role.update') }}">
                    <input type="hidden" name="role_id" id="role_id_edit" value="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Perubahan Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="role_desc">Nama Role</label>
                            <input type="text" class="form-control" name="role_desc" id="role_desc_edit">
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
    ajax: "{{ route('admin.master.role.getdata') }}",
    columns: [{
            data: 'role_id',
            name: 'role_id'
        },
        {
            data: 'role_desc',
            name: 'role_desc'
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
    $.get('/admin/master/role/get/' + data_id, function(data) {
        $("#role_id_edit").val(data.role_id);
        $('#role_desc_edit').val(data.role_desc);
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


