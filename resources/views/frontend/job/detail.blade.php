@extends('frontend.layouts.main')
@section('content')
<!-- section page title start -->
<div class="jbm-page-title page-title-bg-2">
    <div class="container">
         <div class="row">
            <div class="col-xs-12 text-center">
                <span class="section-tit-line"></span>
                    <h2>Detail Lowongan</h2>
            </div>
        </div>
    </div>
</div>
<!-- section page title start -->
<!-- job title info -->
<div class="job-info padding-top-60">
<div class="container">
    <div class="row margin-bottom-60">
            @if (Auth::guest())
    <div class="alert alert-danger">
        <h2><b>Belum Login</b></h2><br>
        <h4><p>Silahkan login terlebih dahulu untuk melamar pekerjaan. <a href="{{ route('login') }}">Login Disini!</a></p></h4>
    </div>
    @endif
        <div class="col-md-6 col-sm-12 col-xs-12 full-wdth">
            <!-- Left-aligned -->
                <div class="media">
                  <div class="media-left">
                    <img src="/imgs/perusahaan/{{ $lowongan->tblperusahaan->tblperusahaan_detail->logo_pic }}" alt="" class="media-object" width="100px" height="100px"/>
                  </div>
                  <div class="media-body style2">
                    <h6 class="media-heading style2">{{ $lowongan->title }}</h6>
                  </div>
                </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12 full-wdth">
            <div class="candidate-bottom padding-top-30 text-right stl2">
                @if (Auth::guest())
                    <button class="jbm-button apply-btn jbm-button-3" disabled>Belum Login</button>
                @elseif (Auth::user()->tblmahasiswa == null)
                    <button class="jbm-button apply-btn jbm-button-3" disabled>Bukan Mahasiswa</button>
                @elseif ($lowongan->is_active == 0)
                    <button class="jbm-button apply-btn jbm-button-3" disabled>Tidak Aktif</button>
                @elseif ($lowongan->expired_date < date("Y-m-d h:i:sa"))
                    <button class="jbm-button apply-btn jbm-button-3" disabled>Expired</button>
                @else
                    <button class="jbm-button apply-btn jbm-button-3">Lamar Pekerjaan</button>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- candidate personal info -->
<div class="container">
<div class="row">
    <div class="col-xs-12">
        <div class="candidate-personal-info jbm-relative jbm-accordion">
            <div class="row">
                <div class="col-md-4 margin-bottom-30">
                    <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Lokasi: {{ $lowongan->tbllowongan_detail->tblkota->kota_nama }}</a>
                </div>
                <div class="col-md-4 margin-bottom-30">
                    <a href="#"><i class="fa fa-building" aria-hidden="true"></i>&nbsp;Perusahaan: {{ $lowongan->tblperusahaan->nama }}</a>
                </div>
                <div class="col-md-4 margin-bottom-30">
                    <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;Email: {{ $lowongan->tblperusahaan->tblperusahaan_detail->pic_email }}</a>
                </div>
            </div>
            <div class="row jbm-dis-none candidate-personal-detail jbm-accordion-more">
                <div class="col-md-4 margin-bottom-30">
                    <a href="#"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Nomor Telepon: {{ $lowongan->tblperusahaan->tblperusahaan_detail->phone_number }}</a>
                </div>
                <div class="col-md-4 margin-bottom-30">
                    <a href="#"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>&nbsp;Fakultas: {{ $lowongan->tbllowongan_detail->tblfakultas->fakultas_name }}</a>
                </div>
                <div class="col-md-4 margin-bottom-30">
                    <a href="#"><i class="fa fa-money" aria-hidden="true"></i>&nbsp;Gaji: Rp. {{ number_format($lowongan->tbllowongan_detail->salary_min,0, ',' , '.') }} - Rp. {{ number_format($lowongan->tbllowongan_detail->salary_max,0, ',' , '.') }} @if ($lowongan->tbllowongan_detail->is_salary_nego == 1) "(Negotiable)" @endif</a>
                </div>
                <div class="col-md-4 margin-bottom-30">
                    <a href="#"><i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;Tipe: {{ $lowongan->tbllowongan_detail->tbllowongan_type_mst->low_type_desc }}</a>
                </div>
                <div class="col-md-4 margin-bottom-30">
                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Aktif sampai: {{ date('Y-m-d', strtotime($lowongan->expired_date)) }}</a>
                    </div>
            </div>
            <a href="#" class="expand-candi-info">
                <i class="fa fa-plus"  aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>
</div>
<!-- candidate personal info ends -->

<!-- Brief Description -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="jbm-job-content">
                    <h5>Profil Perusahaan</h5>
                    <p>{!! nl2br($lowongan->tblperusahaan->tblperusahaan_detail->deskripsi) !!}</p>
                    <br>
                    <h5>Job Description</h5>
                    <p>{!! nl2br($lowongan->deskripsi) !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brief Description ends-->
<!-- start section helpbox -->
<div class="jbm-section-helpbox main-1st-bg padding-top-75 padding-bottom-100">
    <!-- start section title -->
    <div class="jbm-section-title title-white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <span class="section-tit-line"></span>
                    <h2 class="white"><span class="fw-400">Butuh</span>  Bantuan?</h2>
                    <p>Silahkan kontak kami dengan menekan <a href="contact-us.html">link ini</a>.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end section title -->
</div>
<!-- end section helpbox -->
@if (!Auth::guest() && Auth::user()->tblmahasiswa != null)
<div class="apply-job-popup">
    <div class="popup-overlay"></div>
    <!-- Candidate popup -->
    <div class="popup">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-md-5 jbm-login-side apply">
                            <i class="fa fa-lightbulb-o margin-bottom-50" aria-hidden="true"></i>
                            <span class="section-tit-line"></span>
                            <h3 class="margin-bottom-60">Lamar Pekerjaan</h3>
                            <ul class="new-signup">

                                </ul>

                                <ul class="jbm-social-icons">

                                </ul>
                    </div>
                    <div class="col-md-7 jbm-form">
                        <div class="jbm-field margin-top-20">
                            <div class="alert alert-info"><strong>Informasi</strong><br>Anda akan melamar pekerjaan di : <br><b>{{ $lowongan->tblperusahaan->nama }}</b><br> Posisi: <b>{{ $lowongan->title }}</b><br>Setelah anda melamar pekerjaan ini, perusahaan ini dapat melihat data diri, dan dokumen anda seperti CV, Ijazah, dst</div>
                            <form method="POST" action="{{ route('job.apply') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="lowongan_id" value="{{ $lowongan->lowongan_id }}">
                            <div class="col-md-12">
                                 <div class="form-group">
                                    <textarea name="mhs_desc" id="mhs_desc" class="form-control"></textarea>
                                    <label for="mhs_desc">Promosikan diri anda</label>
                                </div>
                            </div>
                            @if ($lowongan->tbllowongan_detail->low_type_id == 3)
                            <div class="col-md-12">
                                    <div class="form-group field-active">
                                       <input type="file" name="magang" id="magang" class="form-control always-active" accept="application/pdf">
                                       <label for="number5">Surat Magang/Internship dari Fakultas (PDF)</label>
                                   </div>
                               </div>
                            @endif
                            <button type="submit" class="jbm-button jbm-button-3 jbm-hover margin-bottom-15">Lamar Pekerjaan</button>
                            </form>
                        </div>
                    </div>
                    <div class="close-btn">
                        <i class="fa fa-close"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Candidate popup -->
</div><!--apply job popup end-->
@endif
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
