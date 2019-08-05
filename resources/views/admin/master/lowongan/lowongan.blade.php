@extends('layouts.main')

@section('title', 'Campus Hiring - Master Lowongan')

@section('title-section', 'Master Lowongan')

@section('css')
<link rel="stylesheet" href="{{ asset("admin_assets/modules/summernote/summernote-bs4.css") }}">
<link rel="stylesheet" href="{{ asset("admin_assets/modules/bootstrap-daterangepicker/daterangepicker.css") }}">
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
                            <th>Status Aktif</th>
                            <th>Tanggal Aktif</th>
                            <th>Status Approval</th>
                            <th>Tanggal Approval</th>
                            <th>Diapprove oleh</th>
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
                            <input type="text" class="form-control datetimepicker" name="active_date">
                        </div>
                        <div class="form-group">
                            <label for="is_approved">Status Approval</label>
                            <select name="is_approved" id="is_approved" class="form-control">
                                <option value="1">Approved</option>
                                <option value="0">Menunggu Approval</option>
                                <option value="-1">Rejected</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="approved_date">Tanggal Approval</label>
                            <input type="text" class="form-control" name="approved_date">
                        </div>
                        <div class="form-group">
                            <label for="approved_date">Diapprove oleh</label>
                            <input type="text" name="approved_by" id="approved_by" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="duration">Durasi</label>
                            <select name="duration" id="duration" class="form-control">
                                <option value="2">2 Minggu</option>
                                <option value="4">1 Bulan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kota_id">Kota</label>
                            <select name="kota_id" id="kota_id" class="form-control">
                                @foreach ($kotas as $kota)
                                <option value="{{ $kota->kota_id }}">{{ $kota->kota_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="low_type_id">Tipe Lowongan</label>
                            <select name="low_type_id" id="low_type_id" class="form-control">
                                @foreach ($lowtypes as $low_type)
                                <option value="{{ $low_type->low_type_id }}">{{ $low_type->low_type_desc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fakultas_id">Fakultas</label>
                            <select name="fakultas_id" id="fakultas_id" class="form-control">
                                @foreach ($fakultass as $fakultas)
                                    <option value="{{ $fakultas->fakultas_id }}">{{ $fakultas->fakultas_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="skill_id">Skill</label>
                            <select name="skill_id" id="skill_id" class="form-control">
                                @foreach ($skills as $skill)
                                    <option value="{{ $skill->skill_id }}" class="{{ $skill->fakultas_id }}">{{ $skill->skill_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="salary_min">Gaji Minimal</label>
                              <input type="number" class="form-control" id="salary_min" name="salary_min" placeholder="Gaji Minimal">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="salary_max">Gaji Maksimal</label>
                              <input type="number" class="form-control" id="salary_max" name="salary_max" placeholder="Gaji Maksimal">
                            </div>
                          </div>
                        <div class="form-group">
                            <label for="is_salary_nego">Gaji negotiable</label>
                            <select name="is_salary_nego" id="is_salary_nego" class="form-control">
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
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
                            <input type="date" class="form-control" name="active_date" id="active_date_edit">
                        </div>
                        <div class="form-group">
                            <label for="is_approved">Status Approval</label>
                            <select name="is_approved" id="is_approved_edit" class="form-control">
                                <option value="1">Approved</option>
                                <option value="0">Menunggu Approval</option>
                                <option value="-1">Rejected</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="approved_date">Tanggal Approval</label>
                            <input type="text" class="form-control" name="approved_date" id="approved_date_edit">
                        </div>
                        <div class="form-group">
                            <label for="approved_date">Diapprove oleh</label>
                            <input type="text" name="approved_by" id="approved_by_edit" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="duration">Durasi</label>
                            <select name="duration" id="duration_edit" class="form-control">
                                <option value="2">2 Minggu</option>
                                <option value="4">1 Bulan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kota_id">Kota</label>
                            <select name="kota_id" id="kota_id_edit" class="form-control">
                                @foreach ($kotas as $kota)
                                <option value="{{ $kota->kota_id }}">{{ $kota->kota_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="low_type_id">Tipe Lowongan</label>
                            <select name="low_type_id" id="low_type_id_edit" class="form-control">
                                @foreach ($lowtypes as $low_type)
                                <option value="{{ $low_type->low_type_id }}">{{ $low_type->low_type_desc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fakultas_id">Fakultas</label>
                            <select name="fakultas_id" id="fakultas_id_edit" class="form-control">
                                @foreach ($fakultass as $fakultas)
                                    <option value="{{ $fakultas->fakultas_id }}">{{ $fakultas->fakultas_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="skill_id">Skill</label>
                            <select name="skill_id" id="skill_id_edit" class="form-control">
                                @foreach ($skills as $skill)
                                    <option value="{{ $skill->skill_id }}" class="{{ $skill->fakultas_id }}">{{ $skill->skill_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="salary_min">Gaji Minimal</label>
                              <input type="number" class="form-control" id="salary_min_edit" name="salary_min" placeholder="Gaji Minimal">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="salary_max">Gaji Maksimal</label>
                              <input type="number" class="form-control" id="salary_max_edit" name="salary_max" placeholder="Gaji Maksimal">
                            </div>
                          </div>
                        <div class="form-group">
                            <label for="is_salary_nego">Gaji negotiable</label>
                            <select name="is_salary_nego" id="is_salary_nego_edit" class="form-control">
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
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
<script src="{{ asset('admin_assets/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('admin_assets/js/chain.min.js') }}"></script>
<script src="{{ asset('admin_assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script>
var skillCopy = $("#skill_id_edit").clone();
$('.datetimepicker').daterangepicker({
        parentEl: "#addModal .modal-body",
        locale: {format: 'YYYY-MM-DD hh:mm:ss'},
        singleDatePicker: true,
        timePicker: true,
        timePicker24Hour: true,
        timePickerSeconds: true
});
$(function () {
$("#skill_id").chained("#fakultas_id");
$("#skill_id_edit").chained("#fakultas_id_edit");
$('#deskripsi').summernote();
$('#deskripsi_edit').summernote();
$('#table-1').dataTable({
    serverSide: true,
    processing: true,
    responsive: true,
    ajax: "{{ route('admin.master.lowongan.getdata') }}",
    columns: [{
            data: 'lowongan_id',
            name: 'tbllowongan.lowongan_id'
        },
        {
            data: 'nama',
            name: 'tblperusahaan.nama'
        },
        {
            data: 'title',
            name: 'tbllowongan.title'
        },
        {
            data: 'is_active',
            name: 'tbllowongan.is_active'
        },
        {
            data: 'active_date',
            name: 'tbllowongan.active_date'
        },
        {
            data: 'is_approved',
            name: 'tbllowongan.is_approved'
        },
        {
            data: 'approved_date',
            name: 'tbllowongan.approved_date'
        },
        {
            data: 'approved_by',
            name: 'tbllowongan.approved_by'
        },
        {
            data: 'duration',
            name: 'tbllowongan.duration'
        },
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        }
    ],
});
});
$(document).on("click", ".editbutton", function() {
    let data_id = $(this).attr('data-id');
    $.get('/admin/master/lowongan/get/' + data_id, function(data) {
        console.log(data);
        $('#fakultas_id_edit').unbind('change');
        $('#skill_id_edit').html(skillCopy.html());
        $("#skill_id_edit").val(data.tbllowongan_detail.skill_id);
        $('#fakultas_id_edit').val(data.tbllowongan_detail.fakultas_id);
        $('#kota_id_edit').val(data.tbllowongan_detail.kota_id);
        $('#salary_min_edit').val(data.tbllowongan_detail.salary_min);
        $('#salary_max_edit').val(data.tbllowongan_detail.salary_max);
        $('#is_salary_nego_edit').val(data.tbllowongan_detail.is_salary_nego);
        $("#perusahaan_id_edit").val(data.perusahaan_id);
        $("#title_edit").val(data.title);
        $('#is_active_edit option[value="' + data.is_active + '"]').prop('selected', true);
        $("#active_date_edit").val(data.active_date);
        $('#is_approved_edit option[value="' + data.is_approved + '"]').prop('selected', true);
        $("#approved_date_edit").val(data.approved_date);
        $("#approved_by_edit").val(data.approved_by);
        $('#duration_edit option[value="' + data.duration + '"]').prop('selected', true);
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

