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
                    <div class="payment-history">
                        <h4>Ubah Password</h4>
                        <span class="section-tit-line-2 margin-bottom-40"></span>

                        <div class="change-pass margin-bottom-30 padding-bottom-60">
                            <h5 class="margin-bottom-40 margin-top-0">Ubah Password</h5>
                             <!-- row start -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="old-pass" id="old-pass" class="form-control">
                                        <label for="old-pass">Password Lama*</label>
                                    </div>
                                </div>
                            </div>
                            <!-- row start -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="new-pass" id="new-pass" class="form-control">
                                        <label for="new-pass">Password Baru*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                </div>
                            </div>
                            <!-- row start -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="confirm-pass" id="confirm-pass" class="form-control">
                                        <label for="confirm-pass">Konfirmasi Password*</label>
                                    </div>
                                </div>
                            </div>
                            <!-- row start -->
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12 full-wdth">
                                    <a href="#" class="jbm-button jbm-button-3 btn">Ubah Password</a>
                                </div>
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
                                <a href="candidate-information.html">Informasi Akun</a>
                            </li>
                            <li>
                                <a href="candidate-job-history.html">Riwayat Lamaran Pekerjaan</a>
                            </li>
                            <li>
                                <a href="cv.html">Unggah Dokumen</a>
                            </li>
                            <li>
                                <a href="candidate-account-setting.html" class="active">Ubah Password</a>
                            </li>
                            <li>
                                <a href="#">Logout</a>
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
    $(document).ready(function(){
        $(".skillID").chained(".fakultasID");
    });
    $(".jbm-select-search").select2();
</script>
@endsection
