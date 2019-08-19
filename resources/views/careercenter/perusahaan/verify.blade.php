@extends('layouts.main')

@section('title', 'Campus Hiring - Verifikasi Perusahaan')

@section('title-section', 'Verifikasi Perusahaan')

@section('css')
<link rel="stylesheet" href="{{ asset("admin_assets/modules/summernote/summernote-bs4.css") }}">
<link rel="stylesheet" href="{{ asset("admin_assets/modules/bootstrap-daterangepicker/daterangepicker.css") }}">
@endsection
@section('content')
<div class="card">
        <div class="card-header">
            <h4>@yield('title-section')</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1" width="100%">
                    <thead>
                        <tr>
                            <th>Nama Perusahaan</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th>Status Approval</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('modal')
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('careercenter.perusahaan.verify.save') }}">
                <input type="hidden" name="perusahaan_id" id="perusahaan_id_edit" value="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi perusahaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="fakultas_name">Status Verifikasi</label>
                        <select name="is_approved" id="is_apprved" class="form-control">
                            <option value="1">Approved</option>
                            <option value="-1">Rejected</option>
                            <option value="0" selected>Menunggu Approval</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="notes">Catatan</label>
                        <textarea name="notes" id="notes" class="form-control"  cols="30" rows="10"></textarea>
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
    ajax: "{{ route('careercenter.perusahaan.verify.getdata') }}",
    columns: [{
            data: 'nama',
            name: 'tblperusahaan.nama'
        },
        {
            data: 'alamat',
            name: 'tblperusahaan_detail.alamat'
        },
        {
            data: 'phone_number',
            name: 'tblperusahaan_detail.phone_number'
        },
        {
            data: 'is_approved',
            name: 'tblperusahaan.is_approved'
        },
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        }
    ],
});
$(document).on('click', '.editbutton', function () {
    var data_id = $(this).data('id');
    $("#perusahaan_id_edit").val(data_id);

    $("#editModal").modal('show');

})
</script>
@endsection

