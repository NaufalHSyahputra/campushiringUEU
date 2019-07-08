@extends('frontend.layouts.main')
@section('content')
<!-- section page title start -->
<div class="jbm-page-title page-title-bg-2">
    <div class="container">
         <div class="row">
            <div class="col-xs-12 text-center">
                <span class="section-tit-line"></span>
                    <h2>{{ $lowongan->title }}</h2>
            </div>
        </div>
    </div>
</div>
<!-- section page title start -->
<!-- job title info -->
<div class="job-info padding-top-60">
<div class="container">
    <div class="row margin-bottom-60">
        <div class="col-md-6 col-sm-12 col-xs-12 full-wdth">
            <!-- Left-aligned -->
                <div class="media">
                  <div class="media-left">
                    <img src="{{ $lowongan->tblperusahaan->logo_pic }}" alt="" class="media-object" />
                  </div>
                  <div class="media-body style2">
                    <h6 class="media-heading style2">{{ $lowongan->title }}</h6>
                  </div>
                </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12 full-wdth">
            <div class="candidate-bottom padding-top-30 text-right stl2">
                <a href="#" class="jbm-button apply-btn jbm-button-3">Lamar Pekerjaan</a>
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
                    <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;{{ $lowongan->tbllowongan_detil->tblkota->kota_nama }}</a>
                </div>
                <div class="col-md-4 margin-bottom-30">
                    <a href="#"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;{{ $lowongan->tblperusahaan->nama }}</a>
                </div>
                <div class="col-md-4 margin-bottom-30">
                    <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;{{ $lowongan->tblperusahaan->email }}</a>
                </div>
            </div>
            <div class="row jbm-dis-none candidate-personal-detail jbm-accordion-more">
                <div class="col-md-4 margin-bottom-30">
                    <a href="#"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;{{ $lowongan->tblperusahaan->phone_number }}</a>
                </div>
                <div class="col-md-4 margin-bottom-30">
                    <a href="#"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>&nbsp;{{ $lowongan->tbllowongan_detil->tblfakultas->fakultas_name }}</a>
                </div>
                <div class="col-md-4 margin-bottom-30">
                    <a href="#"><i class="fa fa-money" aria-hidden="true"></i>&nbsp;{{ $lowongan->tbllowongan_detil->salarymin }} - {{ $lowongan->tbllowongan_detil->salarymax }}</a>
                </div>
                <div class="col-md-4 margin-bottom-30">
                    <a href="#"><i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;{{ $lowongan->tbllowongan_detil->tbllowongan_type_mst->low_type_desc }}</a>
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
                    {!! nl2br($lowongan->tblperusahaan->deskripsi) !!}
                    <br>
                    <h5>Job Description</h5>
                    {!! nl2br($lowongan->deskripsi) !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brief Description ends-->
<!-- Best candidate -->
<div class="jbm-section-title-2">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 margin-bottom-40">
                <h4>Related Jobs</h4>
                <span class="section-tit-line-2"></span>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row  best-candidate-img">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="best-candidate-box text-center">
                <img src="assets/img/blog-270x180-1.jpg" alt="blog-270x180" />
                <span class="best-candi-time">Full Time</span>
                <h5><a href="#">SEO Analyst</a></h5>
                <a href="#" class="best-candi-posi">@ CompanyA</a>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="best-candidate-box text-center">
                <img src="assets/img/blog-270x180-2.jpg" alt="blog-270x180" />
                <span class="best-candi-time">Part Time</span>
                <h5><a href="#">Affiliate Marketing</a></h5>
                <a href="#" class="best-candi-posi">@ Companyb</a>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="best-candidate-box text-center">
                <img src="assets/img/blog-270x180-3.jpg" alt="blog-270x180" />
                <span class="best-candi-time">Internship</span>
                <h5><a href="#">Content Writer</span></a></h5>
                <a href="#" class="best-candi-posi">@ CompanyC</a>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="best-candidate-box text-center">
                <img src="assets/img/blog-270x180-4.jpg" alt="blog-270x180" />
                <span class="best-candi-time">Freelancer</span>
                <h5><a href="#">Market Updates</span></a></h5>
                <a href="#" class="best-candi-posi">@ CompanyD</a>
            </div>
        </div>
    </div>
</div>
<!-- Best candidate ends-->

<div class="jbm-ad-banner padding-bottom-100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <img src="assets/img/ad-ban.jpg" alt="ad-ban" />
            </div>
        </div>
    </div>
</div>
<!-- start section helpbox -->
<div class="jbm-section-helpbox main-1st-bg padding-top-75 padding-bottom-100">
    <!-- start section title -->
    <div class="jbm-section-title title-white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <span class="section-tit-line"></span>
                    <h2 class="white"><span class="fw-400">Need Some</span>  Help?</h2>
                    <p>Feel free to visit our <a href="faqs.html">FAQ section</a>. You can also send us an email <a href="contact-us.html">here</a> or give us a call on (123) 123 456 7890.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end section title -->
</div>
<!-- end section helpbox -->
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
