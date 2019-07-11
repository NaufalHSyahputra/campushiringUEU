@extends('frontend.layouts.main')
@section('content')
  <!-- start banner -->
  <div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="jbm-banner-text text-center">
                    <div class="jbm-ban-txt-line-1">
                        <h1>
                            CAMPUS HIRING CAREER CENTER UNIVERSITAS ESA UNGGGUL
                        </h1>
                    </div>
                    <div class="jbm-ban-txt-line-2">
                        <p class="blockquote">“Aplikasi yang menyatukan mahasiswa dan alumni Universitas Esa Unggul dengan perusahaan yang sedang mencari tenaga kerja”</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end banner -->
 <!-- start search -->
 <div class="jbm-search-bar jbm-search-1">
    <div class="container">
    <form action="search" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="jbm-sch-inner margin-top-85-minus">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Cari Kata Kunci" />
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <select class="jbm-s-category jbm-select-search" name="kotaID" id="jbm-s-category">
                                    <option value="" selected>--Pilih kota--</option>
                                    @foreach ($kotas as $kota)
                                        <option value="{{ $kota->kota_id }}">{{ $kota->kota_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                    <select class="jbm-s-category jbm-select-search fakultasID" name="fakultasID" id="jbm-s-category fakultasID">
                                            <option value="" selected>--Pilih Fakultas--</option>
                                            @foreach ($fakultass as $fakultas)
                                                <option value="{{ $fakultas->fakultas_id }}">{{ $fakultas->fakultas_name }}</option>
                                            @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                    <select class="jbm-s-category jbm-select-search skillID" name="skillID" id="jbm-s-category skillID">
                                            <option value="" selected>--Pilih posisi pekerjaan--</option>
                                            @foreach ($skills as $skill)
                                                <option value="{{ $skill->skill_id }}" class="{{ $skill->fakultas_id }}">{{ $skill->skill_name }}</option>
                                            @endforeach
                                        </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <select class="jbm-s-year jbm-select-hide-search" name="lowTypeID" id="jbm-s-year" style="width: 100%;">
                                        <option value="" selected>--Pilih level pekerjaan--</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->low_type_id }}">{{ $level->low_type_desc }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                        <input type="text" class="form-control" id="gajiMin" name="gajiMin" placeholder="Masukkan Gaji Minimal yang diinginkan" />

                                    </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group ">
                                        <input type="submit" class="form-control" id="search-btn" name="search" value="Cari Pekerjaan" />
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- end search -->
<!-- start section title -->
<div class="jbm-section-title margin-top-100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <span class="section-tit-line"></span>
                <h2>Lowongan pekerjaan berdasarkan <span class="fw-400">Fakultas</span></h2>
                <p>Cari pekerjaan sesuai dengan fakultas yang kalian pilih.</p>
            </div>
        </div>
    </div>
</div>
<!-- end section title -->
<!-- end section category -->
<div class="jbm-section-catgory padding-top-80 padding-bottom-100">
    <div class="container">
        <div class="row">
            @php
                $faculties = App\Models\Tblfakultas::all();
            @endphp
            @foreach ($faculties as $faculty)
            <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="jbm-category-box clearfix">
                        <span class="category-icon">
                            <i class="fa fa-{{ $faculty->icon }} fa-4x"></i>
                        </span>
                        <a href="#" class="jbm-cat-title">{{ $faculty->fakultas_name }}</a>
                        <span class="jbm-cat-jobs">
                            17 <br />
                            Lowongan
                        </span>
                    </div>
                </div>
            @endforeach
    </div>
</div>
<!-- end section category -->

<!-- start section title -->
<div class="jbm-section-title margin-top-100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <span class="section-tit-line"></span>
                <h2><span class="fw-400">Lowongan Pekerjaan</span> Terbaru</h2>
                <p>Anda dapat melihat lowongan pekerjaan terbaru disini.</p>
            </div>
        </div>
    </div>
</div>
<!-- end section title -->
<!-- end section category -->
<div class="jbm-section-jobs padding-top-80 padding-bottom-100">
    <div class="container">
        <div class="row">
            @php
                $lowongans = App\Models\Tbllowongan::where("is_active", 1)->latest()->limit(5)->get();
            @endphp
            @foreach ($lowongans as $low)
            <div class="col-md-12 col-sm-12 col-xs-12 jbm-job-loop">
                    <div class="jbm-job-loop-in">
                        <div class="row">
                            <div class="col-md-3 col-sm-5 col-xs-5 full-wdth mg-btm-20 text-left jbm-first-col">
                                <div class="jbm-company-logo"><img src="https://s.kaskus.id/r480x480/images/fjb/2015/04/16/jasa_pembuatan_desain_logo_perusahaan_murah_tidak_murahan_1157447_1429123045.JPG" width="75px" height="75px"></div>
                                <div class="jbm-job-title">
                                    <a href="#" class="title-link">{{ $low->title }}</a>
                                    <br />
                                    <a href="mailto:" class="jbm-job-email">{{ $low->tblperusahaan->nama }}</a>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-2 col-xs-4 text-center">
                                <div class="jbm-job-locaction">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <br />
                                    <a href="#">{{ $low->tbllowongan_detil->tblkota->kota_nama }}</a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-4 text-center">
                                <div class="jbm-job-price">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                    <br />
                                    <span>Rp. {{ number_format($low->tbllowongan_detil->salary_min,0, ',' , '.') }} - Rp. {{ number_format($low->tbllowongan_detil->salary_max,0, ',' , '.') }}</span>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-4 text-center">
                                <div class="jbm-job-timing">
                                    @if ($low->tbllowongan_detil->low_type_id == 1 )
                                        <i class="fa fa-battery-full" aria-hidden="true"></i>
                                    @elseif ($low->tbllowngan_detil->low_type_id == 2)
                                        <i class="fa fa-battery-half" aria-hidden="true"></i>
                                    @elseif ($low->tbllowngan_detil->low_type_id == 2)
                                        <i class="fa fa-battery-empty" aria-hidden="true"></i>
                                    @endif
                                    <br />
                                    <span>{{ $low->tbllowongan_detil->tbllowongan_type_mst->low_type_desc }}</span>
                                </div>
                            </div>
                            <div class="col-md-2 col-xs-12 col-xs-12">
                                <div class="jbm-job-links">

                                    <div class="jbm-job-apply">
                                            <a href="single-job.html">Job Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--jbm-job-loop-in-->
                </div><!--jbm-job-loop-->
            @endforeach
        </div>
        <div class="row margin-top-40 margin-bottom-50">
            <div class="col-xs-12 text-center">
                <a href="#" class="jbm-loadmore">Tampilkan semua lowongan</a>
            </div>
        </div>
    </div>
</div>
<!-- end section category -->
<!-- start section counterup -->
<div class="jbm-section-coounterup main-2nd-bg padding-top-50 padding-bottom-80">
    <!-- start section title -->
    <div class="jbm-section-title title-white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <span class="section-tit-line"></span>
                    <h2><span class="fw-400">Our Successful</span> Milestones</h2>
                    <p>Make the most of the opportunity available by browsing among the most trending categories and get hired today.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end section title -->
    <div class="container margin-top-90">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6 full-wdth">
                <div class="counterup-box">
                    <h2 class="count">40.256</h2>
                    <p>Jobs Posted</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 full-wdth">
                <div class="counterup-box">
                    <h2 class="count">2477</h2>
                    <p>Companies Registered</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 full-wdth">
                <div class="counterup-box">
                    <h2 class="count">124.586</h2>
                    <p>Candidtate Profiles</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 full-wdth">
                <div class="counterup-box">
                    <h2 class="count">172</h2>
                    <p>Awards Won</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section counterup -->
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
