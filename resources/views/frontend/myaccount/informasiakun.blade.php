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
                        <div class="jbm-company-info">
                                <h4>Informasi Akun</h4>
                                <span class="section-tit-line-2 margin-bottom-40"></span>

                                <div class="company-details margin-bottom-30 change-pass padding-bottom-60">
                                    <form action="{{ route("myaccount.informasiAkun.proses") }}" method="POST">
                                        @csrf
                                    <h5 class="margin-bottom-60">Informasi Akun</h5>
                                    <!-- row start -->
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group field-active">
                                                <input type="text" name="nim" id="nim" class="form-control always-active" value="{{ $user->tblmahasiswa_detail->nim }}">
                                                <label for="nim">NIM*</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group  field-active">
                                                    <input type="text" name="nama" id="nama" class="form-control always-active" value="{{ $user->tblmahasiswa_detail->nama }}">
                                                    <label for="nama">Nama*</label>
                                                </div>
                                            </div>
                                    </div>

                                    <!-- row start -->
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group  field-active">
                                                <input type="text" name="nik" id="nik"  value="{{ $user->tblmahasiswa_detail->nik }}" class="form-control always-active">
                                                <label for="nik">NIK*</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group jbm-select-2">
                                                    <select class="jbm-s-salary jbm-select-hide-search" name="gender" id="gender">
                                                        @if ($user->tblmahasiswa_detail->gender == "Laki-Laki")
                                                        <option value="Laki-Laki" selected>Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                        @else
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan" selected>Perempuan</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                    </div>

                                    <!-- row start -->
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group field-active">
                                                <input type="text" name="alamat" id="alamat" class="form-control always-active" value="{{ $user->tblmahasiswa_detail->alamat }}">
                                                <label for="alamat">Alamat lengkap*</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group field-active">
                                                    <div class="form-group jbm-select-2">
                                                            <select class="jbm-s-salary jbm-select-hide-search" name="prov_id" id="prov_id">
                                                                @foreach ($provs as $prov)
                                                                    @if ($prov->prov_id == $user->prov_id)
                                                                        <option value="{{ $prov->prov_id }}" selected>{{ $prov->prov_nama }}</option>
                                                                    @else
                                                                    <option value="{{ $prov->prov_id }}">{{ $prov->prov_nama }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group field-active">
                                                    <div class="form-group jbm-select-2">
                                                            <select class="jbm-s-salary jbm-select-hide-search" name="kota_id" id="kota_id">
                                                                    @foreach ($kotas as $kota)
                                                                        @if ($kota->kota_id == $user->kota_id)
                                                                            <option value="{{ $kota->kota_id }}" selected>{{ $kota->kota_nama }}</option>
                                                                        @else
                                                                            <option value="{{ $kota->kota_id }}">{{ $kota->kota_nama }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                        </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- row start -->
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group field-active">
                                                <input type="email" name="email" id="email" disabled class="form-control always-active" value="{{ $user->tblmahasiswa_detail->email }}">
                                                <label for="email">Email Address*</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group field-active">
                                                <input type="text" name="nohp" id="nohp" class="form-control always-active" value="{{ $user->tblmahasiswa_detail->nohp }}">
                                                <label for="nohp">Nomor Telepon</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group field-active">
                                                        <div class="form-group jbm-select-2">
                                                                <select class="jbm-s-salary jbm-select-hide-search" name="fakultas_id" id="fakultas_id">
                                                                    @foreach ($fakultass as $fakultas)
                                                                        @if ($fakultas->fakultas_id == $user->fakultas_id)
                                                                            <option value="{{ $fakultas->fakultas_id }}" selected>{{ $fakultas->fakultas_name }}</option>
                                                                        @else
                                                                        <option value="{{ $fakultas->fakultas_id }}">{{ $fakultas->fakultas_name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group field-active">
                                                        <div class="form-group jbm-select-2">
                                                                <select class="jbm-s-salary jbm-select-hide-search" name="jurusan_id" id="jurusan_id">
                                                                        @foreach ($jurusans as $jurusan)
                                                                            @if ($jurusan->jurusan_id == $user->jurusan_id)
                                                                                <option value="{{ $jurusan->jurusan_id }}" selected>{{ $jurusan->jurusan_name }}</option>
                                                                            @else
                                                                                <option value="{{ $jurusan->jurusan_id }}">{{ $jurusan->jurusan_name }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                            </div>
                                                </div>
                                            </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group field-active">
                                                <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control always-active" value="{{ $user->tblmahasiswa_detail->tahun_ajaran }}">
                                                <label for="tahun_ajaran">Tahun Angkatan</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group field-active">
                                                    <select class="jbm-s-salary jbm-select-hide-search" name="is_lulus" id="is_lulus">
                                                    @if ($user->tblmahasiswa_detail->is_lulus == "1")
                                                    <option value="1" selected>Sudah Lulus</option>
                                                    <option value="0">Belum Lulus</option>
                                                    @else
                                                    <option value="1">Sudah Lulus</option>
                                                    <option value="0" selected>Belum Lulus</option>
                                                    @endif
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group field-active">
                                                <input type="text" name="tahun_lulus" id="tahun_lulus" value="{{ $user->tblmahasiswa_detail->tahun_lulus }}" class="form-control always-active">
                                                <label for="tahun_lulus">Tahun Lulus</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- row start -->
                                    <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 full-wdth">
                                                <button type="submit" class="jbm-button jbm-button-3 btn">Ubah Data Diri</button>
                                            </div>
                                        </form>
                                            <div class="col-md-6 col-sm-6 col-xs-12 full-wdth text-right tct">
                                                <p>(Semua input yang ditandai dengan * wajib diisi)</p>
                                            </div>
                                        </div>
                                </div>
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
<script>
    var kotaCopy = $("#kota_id").clone();
    $("#kota_id").chained("#prov_id");
    $('#kota_id').html(kotaCopy.html());
</script>
@endsection
