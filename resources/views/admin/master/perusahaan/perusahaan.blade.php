@extends('layouts.main')

@section('title', 'Campus Hiring - Master Perusahaan')

@section('title-section', 'Master Perusahaan')

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
                            <th>Perusahaan ID</th>
                            <th>Nama Perusahaan</th>
                            <th>Alamat</th>
                            <th>Provinsi</th>
                            <th>Kota</th>
                            <th>Nomor Telepon</th>
                            <th>E-Mail</th>
                            <th>Status</th>
                            <th>User ID</th>
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
                <form method="POST" action="{{ route('admin.master.perusahaan.save') }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Perusahaan</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Perusahaan</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="prov_id">Provinsi</label>
                            <select name="prov_id" id="prov_id" class="form-control">
                                <option value="">--Pilih Provinsi--</option>
                                @foreach ($provs as $prov)
                                    <option value="{{ $prov->prov_id }}">{{ $prov->prov_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kota_id">Kota</label>
                            <select name="kota_id" id="kota_id" class="form-control">
                                    <option value="">--Pilih kota--</option>
                                @foreach ($kotas as $kota)
                                <option value="{{ $kota->kota_id }}" class="{{ $kota->prov_id }}">{{ $kota->kota_nama }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nohp">Nomor Telepon</label>
                            <input type="text" class="form-control" name="nohp">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="perusahaan_nama">Status</label>
                            <select name="is_approved" id="is_approved" class="form-control">
                                <option value="1">Approved</option>
                                <option value="0">Pending</option>
                                <option value="-1">Rejected</option>
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
                <form method="POST" action="{{ route('admin.master.fakultas.update') }}">
                    <input type="hidden" name="perusahaan_id" id="perusahaan_id_edit" value="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Perubahan Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <div class="form-group">
                            <label for="nama">Nama Perusahaan</label>
                            <input type="text" class="form-control" name="nama" id="nama_edit">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Perusahaan</label>
                            <textarea name="alamat" id="alamat_edit" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="prov_id">Provinsi</label>
                            <select name="prov_id" id="prov_id_edit" class="form-control">
                                    <option value="">--Pilih Provinsi--</option>
                                @foreach ($provs as $prov)
                                    <option value="{{ $prov->prov_id }}">{{ $prov->prov_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kota_id">Kota</label>
                            <select name="kota_id" id="kota_id_edit" class="form-control">
                                    <option value="">--Pilih Kota--</option>
                            @foreach ($kotas as $kota)
                                <option value="{{ $kota->kota_id }}" class="{{ $kota->prov_id }}">{{ $kota->kota_nama }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nohp">Nomor Telepon</label>
                            <input type="text" class="form-control" name="nohp" id="nohp_edit">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email_edit">
                        </div>
                        <div class="form-group">
                            <label for="nama">Status</label>
                            <select name="is_approved" id="is_approved_edit" class="form-control">
                                <option value="1">Approved</option>
                                <option value="0">Pending</option>
                                <option value="-1">Rejected</option>
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
<script src="{{ asset('admin_assets/js/chain.min.js') }}"></script>
<script>
    var kotaCopy = $("#kota_id_edit").clone();
    $(function () {
        $("#kota_id").chained("#prov_id");
        $("#kota_id_edit").chained("#prov_id_edit");
    });
$('#table-1').dataTable({
    serverSide: true,
    processing: true,
    responsive: true,
    ajax: "{{ route('admin.master.perusahaan.getdata') }}",
    columns: [{
            data: 'perusahaan_id',
            name: 'tblperusahaan.perusahaan_id'
        },
        {
            data: 'nama',
            name: 'tblperusahaan.nama'
        },
        {
            data: 'alamat',
            name: 'tblperusahaan.alamat'
        },
        {
            data: 'prov_nama',
            name: 'tblprovinsi.prov_nama'
        },
        {
            data: 'kota_nama',
            name: 'tblkota.kota_nama'
        },
        {
            data: 'nohp',
            name: 'tblperusahaan.nohp'
        },
        {
            data: 'email',
            name: 'tblperusahaan.email'
        },
        {
            data: 'is_approved',
            name: 'tblperusahaan.is_approved'
        },
        {
            data: 'user_id',
            name: 'tblperusahaan.user_id'
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
    $.get('/admin/master/perusahaan/get/' + data_id, function(data) {
        $('#prov_id_edit').unbind('change');
        $("#perusahaan_id_edit").val(data.perusahaan_id);
        $("#nama_edit").val(data.nama);
        $('#alamat_edit').val(data.alamat);
        $("#nohp_edit").val(data.nohp);
        $("#email_edit").val(data.email);
        $('#is_approved_edit').val(data.is_approved);
        $("#user_id_edit").val(data.user_id);
        $('#kota_id_edit').html(kotaCopy.html());
        $("#kota_id_edit").val(data.kota_id);
        $('#prov_id_edit').val(data.prov_id);
        $("#kota_id_edit").chained("#prov_id_edit");
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



