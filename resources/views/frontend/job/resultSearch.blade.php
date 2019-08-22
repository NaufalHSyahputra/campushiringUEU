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
                            HASIL PENCARIAN LOWONGAN PEKERJAAN
                        </h1>
                    </div>
                    <!--
                    <div class="jbm-ban-txt-line-2">
                        <p class="blockquote"></p>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end banner -->
<!-- start search -->
@include('frontend.layouts.partials.search')
<!-- end search -->
<!-- start section title -->
<div class="jbm-section-title margin-top-100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <span class="section-tit-line"></span>
                <h2><span class="fw-400">Hasil Pencarian</span> Lowongan Pekerjaan</h2>

            </div>
        </div>
    </div>
</div>
<!-- end section title -->
<!-- end section category -->
<div class="jbm-section-jobs padding-top-80 padding-bottom-100">
    <div class="container">
        <div class="row">
            @foreach ($lowongans as $low)
            <div class="col-md-12 col-sm-12 col-xs-12 jbm-job-loop">
                    <div class="jbm-job-loop-in">
                        <div class="row">
                            <div class="col-md-3 col-sm-5 col-xs-5 full-wdth mg-btm-20 text-left jbm-first-col">
                                <div class="jbm-company-logo"><img src="/imgs/perusahaan/{{ $low->tbllowongan->tblperusahaan->tblperusahaan_detail->logo_pic }}" width="75px" height="75px"></div>
                                <div class="jbm-job-title">
                                    <a href="#" class="title-link">{{ $low->tbllowongan->title }}</a>
                                    <br />
                                    <a href="mailto:" class="jbm-job-email">{{ $low->tbllowongan->tblperusahaan->nama }}</a>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-2 col-xs-4 text-center">
                                <div class="jbm-job-locaction">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <br />
                                    <a href="#">{{ $low->tblkota->kota_nama }}</a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-4 text-center">
                                <div class="jbm-job-price">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                    <br />
                                    <span>Rp. {{ number_format($low->salary_min,0, ',' , '.') }} - Rp. {{ number_format($low->salary_max,0, ',' , '.') }}</span>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-4 text-center">
                                <div class="jbm-job-timing">
                                    @if ($low->low_type_id == 1 )
                                        <i class="fa fa-battery-full" aria-hidden="true"></i>
                                    @elseif ($low->low_type_id == 2)
                                        <i class="fa fa-battery-half" aria-hidden="true"></i>
                                    @elseif ($low->low_type_id == 3)
                                        <i class="fa fa-battery-empty" aria-hidden="true"></i>
                                    @endif
                                    <br />
                                    <span>{{ $low->tbllowongan_type_mst->low_type_desc }}</span>
                                </div>
                            </div>
                            <div class="col-md-2 col-xs-12 col-xs-12">
                                <div class="jbm-job-links">

                                    <div class="jbm-job-apply">
                                        <a href="{{ route('job.show', $low->tbllowongan->lowongan_id) }}">Detail pekerjaan</a>
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
                {!! $lowongans->links() !!}
            </div>
        </div>
    </div>
</div>
<!-- end section category -->
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
