@extends('frontend.layouts.main')
@section('content')
<!-- section page  start -->
<div class="jbm-page-title page-title-bg-2 margin-bottom-80">
    <div class="container">
         <div class="row">
            <div class="col-xs-12 text-center">
                <span class="section-tit-line"></span>
                    <h2><span class="fw-400">Akun</span>
                    Saya</h2>
            </div>
        </div>
    </div>
</div>

<!-- employer dashboard -->
<div class="jbm-emp-dashboard pad-xs-top-60">
    <div class="container">
        <div class="row margin-bottom-100">
            <!-- right section -->
            <div class="col-md-8 col-sm-12 col-xs-12 pull-right">
                    <div class="job-history table-sm-setting">
                        <h4>Riwayat Lamaran Pekerjaan</h4>
                        <span class="section-tit-line-2 margin-bottom-40"></span>

                        <div class="job-posted padding-bottom-20 table-sm-setting">
                            <h5 class="margin-bottom-40">Lowongan yang sudah dilamar</h5>
                            <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <th>Judul Lowongan</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Tanggal Pelamaran</th>
                                    <th>Status Respon</th>
                                    <th>Detail Respon</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($lows as $low)
                                        <td>{{ $low->tbllowongan->title }}</td>
                                        <td>{{ $low->tbllowongan->tblperusahaan->nama }}</td>
                                        <td>{{ $low->apply_dates }}</td>
                                        <td>{{ $low->is_respon == 1 ? "Sudah di respon" : "Belum di respon" }}</td>
                                        @if ($low->is_respon == 1)
                                            <td><button class="btn btn-success">Detail</button></td>
                                        @else
                                        <td><button class="btn btn-danger" disabled>Belum Di Respon</button></td>
                                        @endif
                                        <td><a href="{{ route("job.show", $low->lowongan_id) }}" class="btn btn-info">Ke Lowongan</a></td>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div><!--job-posted end-->
                           </div>
                        </div>
            <!-- right section -->
            <!-- Emp sidebar -->
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="jbm-emp-sidebar padding-bottom-30 padding-top-30">
                        <ul class="jbm-dashboard-links">
                            <li>
                                <a href="{{ route('myaccount.index') }}" class="active">Informasi Akun</a>
                            </li>
                            <li>
                                <a href="{{ route('myaccount.riwayat') }}">Riwayat Lamaran Pekerjaan</a>
                            </li>
                            <li>
                                <a href="{{ route('myaccount.dokumen.index') }}">Unggah Dokumen</a>
                            </li>
                            <li>
                                <a href="{{ route("myaccount.index") }}">Ubah Password</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            <!-- Emp sidebar -->
        </div>
        <hr>
    </div>

</div>
<!-- employer dashboard -->
@endsection
@section('js')
<script src="{{ asset('frontend_assets/js/chain.min.js') }}"></script>
<script src=" https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection
