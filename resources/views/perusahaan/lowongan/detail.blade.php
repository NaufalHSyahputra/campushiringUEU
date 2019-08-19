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
        </ul>
        <div class="tab-content" id="myTabContent2">
        <div class="tab-pane fade <?= $show1.$active1 ?>" id="home3" role="tabpanel" aria-labelledby="home-tab3">
            <table class="table table-bordered">

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
                                <td><button class="btn btn-success">Detail</button></td>
                                <td>{{ $pelamar->is_respond == 1 ? "Sudah direspon" : "Belum direspon" }}</td>
                                <td>{{ $pelamar->respond_notes }}</td>
                                <td>{{ $pelamar->respond_date }}</td>
                                <td><button class="btn btn-success">Respon</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table></div>
                </div>
                </div>
            </div>
                    </div>
                </div>
            </div>
@endsection
@section('js')

@endsection

