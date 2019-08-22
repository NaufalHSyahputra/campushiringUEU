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
                            <th>Title</th>
                            <th>Status Aktif</th>
                            <th>Tanggal Aktif</th>
                            <th>Tanggal Expired</th>
                            <th>Status Approval</th>
                            <th>Tanggal Approval</th>
                            <th>Diapprove oleh</th>
                            <th>Jumlah Pelamar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
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
    ajax: "{{ route('perusahaan.lowongan.getdata') }}",
    columns: [{
            data: 'lowongan_id',
            name: 'lowongan_id'
        },
        {
            data: 'title',
            name: 'title'
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
            data: 'expired_date',
            name: 'expired_date'
        },
        {
            data: 'is_approved',
            name: 'is_approved'
        },
        {
            data: 'approved_date',
            name: 'approved_date'
        },
        {
            data: 'approved_by',
            name: 'approved_by'
        },
        {
            data: 'count',
            name: 'count'
        },
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        }
    ],
});
</script>
@endsection

