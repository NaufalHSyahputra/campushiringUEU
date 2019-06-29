<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Esa Unggul</title>
    <!-- stylesheets-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/lib/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/lib/slick/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/lib/select2/css/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/color2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/responsive.css') }}">
    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body>
    <header>
        <!-- start topbar -->
        <div class="jbm-topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 text-left">
                        <ul class="dis-inline list-none jbm-topbar-contact">
                            <li>
                                <a href="tel:+0001234567890"><i class="fa fa-phone"></i>+ 000 123 456 7890</a>
                            </li>
                            <li>
                                <a href="mailto:contactadmin@jobmarket.com"><i class="fa fa-envelope"></i>contactadmin@jobmarket.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 text-right hidden-xs hidden-sm">
                        <ul class="dis-inline list-none  jbm-topbar-login">
                            <li>
                                <a class="login-pop" href="#">Login</a>
                            </li>
                            <li>
                                <a class="register-pop" href="#">Register</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end topbar -->

        <!-- start menu -->
        <div class="jbm-mennubar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="jbm-logo">
                            <a href="index.html">
                                <img src="{{ asset('frontend_assets/img/logo2.png') }}" alt="Esa Unggul Logo" class="img-responsive" />
                            </a>
                        </div>
                        <div class="jbm-menu-icon pull-right hidden-lg">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 302 302" xml:space="preserve" ><g><rect y="36" width="302" height="30" fill="#454545"/><rect y="236" width="302" height="30" fill="#454545"/><rect y="136" width="302" height="30" fill="#454545"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 text-right hidden-md hidden-sm hidden-xs">
                        <nav class="jbm-menu-container">
                            <ul class="jbm-menu list-none dis-inline">
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>
                                    <a href="#">Profil</a>
                                </li>
                                <li>
                                    <a href="#">Lowongan Pekerjaan</a>
                                </li>
                                <li>
                                    <a href="#">Prosedur <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <div class="mega-menu">
                                        <ul>
                                            <li class="jbm-pg-hd">
                                                <h3>Mahasiswa atau Alumni</h3>
                                            </li>
                                            <li>
                                                <a href="candidate-information.html">Pendaftaran</a>
                                            </li>
                                            <li>
                                                <a href="candidate-message.html">Pencarian Lowongan</a>
                                            </li>
                                            <li>
                                                <a href="candidate-message.html">Melamar Pekerjaan</a>
                                            </li>
                                            <li>
                                                <a href="candidate-message.html">Mengunggah Dokumen</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                        <ul>
                                            <li class="jbm-pg-hd">
                                                <h3>Perusahaan</h3>
                                            </li>
                                            <li>
                                                <a href="candidate-search.html">Pendaftaran</a>
                                            </li>
                                            <li>
                                                <a href="candidate-search-with-map.html">Membuat Lowongan</a>
                                            </li>
                                            <li>
                                                <a href="candidate-search-with-filter.html">Melihat pelamar</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!--
                                <li>
                                    <a href="#">Candidates <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <div class="mega-menu">
                                        <ul>
                                            <li class="jbm-pg-hd">
                                                <h3>Candidates Header</h3>
                                            </li>
                                            <li>
                                                <a href="candidate-information.html">Candidate Dashboard</a>
                                            </li>
                                            <li>
                                                <a href="candidate-message.html">Messages</a>
                                            </li>
                                            <li>
                                                <a href="resume.html">Resume</a>
                                            </li>
                                            <li>
                                                <a href="candidate-account-setting.html">Account Settings</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li class="jbm-pg-hd">
                                                <h3>Candidate Search</h3>
                                            </li>
                                            <li>
                                                <a href="candidate-search.html">Find Candidate</a>
                                            </li>
                                            <li>
                                                <a href="candidate-search-with-map.html">Map Search</a>
                                            </li>
                                            <li>
                                                <a href="candidate-search-with-filter.html">Search with Filters</a>
                                            </li>
                                            <li>
                                                <a href="candidate-search-with-alphabets.html">Search by Alphabets</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li class="jbm-pg-hd">
                                                <h3>Candidate Pages</h3>
                                            </li>
                                            <li>
                                                <a href="candidate-single.html">Candidate Single</a>
                                            </li>
                                            <li>
                                                <a href="candidate-job-history.html">Job History</a>
                                            </li>
                                            <li>
                                                <a href="cv.html">CV</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">Employers<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <div class="mega-menu">
                                        <ul>
                                            <li class="jbm-pg-hd">
                                                <h3>Heading One</h3>
                                            </li>
                                            <li>
                                                <a href="single-job.html">Job Single</a>
                                            </li>
                                            <li>
                                                <a href="apply-job.html">Apply Job</a>
                                            </li>
                                            <li>
                                                <a href="employer-information.html">Employer Dashboard</a>
                                            </li>
                                            <li>
                                                <a href="employer-message.html">Message</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li class="jbm-pg-hd">
                                                <h3>Heading Two</h3>
                                            </li>
                                            <li>
                                                <a href="employer-job-history.html">Job History</a>
                                            </li>
                                            <li>
                                                <a href="candidate-applications.html">Candidate Applications</a>
                                            </li>
                                            <li>
                                                <a href="shortlisted-candidates.html">Shortlisted Candidates</a>
                                            </li>
                                            <li>
                                                <a href="payment-history.html">Payment History</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li class="jbm-pg-hd">
                                                <h3>Heading Three</h3>
                                            </li>
                                            <li>
                                                <a href="post-a-job.html">Post A Job</a>
                                            </li>
                                            <li>
                                                <a href="employer-account-setting.html">Account Settings</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">Browse Jobs<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="locations.html">Locations</a>
                                        </li>
                                        <li>
                                            <a href="job-full-time.html">Job Full Time</a>
                                        </li>
                                        <li>
                                            <a href="search-with-map.html">Map Search</a>
                                        </li>
                                        <li>
                                            <a href="search.html">Job Search</a>
                                        </li>
                                        <li>
                                            <a href="search-with-filter.html">Search with Filters</a>
                                        </li>
                                        <li>
                                            <a href="search-with-alphabets.html">Search by Alphabets</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Pages<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <div class="mega-menu">
                                        <ul>
                                            <li class="jbm-pg-hd">
                                                <h3>Page Heading One</h3>
                                            </li>
                                            <li>
                                                <a href="about-us.html">About Us</a>
                                            </li>
                                            <li>
                                                <a href="how-it-works.html">How it Works</a>
                                            </li>
                                            <li>
                                                <a href="terms-and-conditions.html">Terms and Conditions</a>
                                            </li>
                                            <li>
                                                <a href="faqs.html">FAQ</a>
                                            </li>
                                            <li>
                                                <a href="pricing-plans.html">Pricing Plans</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li class="jbm-pg-hd">
                                                <h3>Page Heading Two</h3>
                                            </li>
                                            <li>
                                                <a href="shortcodes.html">Shortcodes</a>
                                            </li>
                                            <li>
                                                <a href="typography.html">Typography</a>
                                            </li>
                                            <li>
                                                <a href="header-styles.html">Headers</a>
                                            </li>
                                            <li>
                                                <a href="404.html">404 Page</a>
                                            </li>
                                            <li>
                                                <a href="contact-us.html">Contact Us</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li class="jbm-pg-hd">
                                                <h3>Page Heading Three</h3>
                                            </li>
                                            <li>
                                                <a href="search-no-result.html">Search with no result</a>
                                            </li>
                                            <li>
                                                <a href="sitemap.html">Site Map</a>
                                            </li>
                                            <li>
                                                <a href="career-jobmarket.html">Career Jobmarket</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">Blogs<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="blog-standard.html">Blog standard</a>
                                        </li>
                                        <li>
                                            <a href="blog-detail.html">Blog Details</a>
                                        </li>
                                        <li>
                                            <a href="blog-detail-fullwidth.html">Blog detail full width</a>
                                        </li>
                                        <li>
                                            <a href="blog-grid.html">Blog grid</a>
                                        </li>
                                        <li>
                                            <a href="blog-list-layout.html">Blog list layout</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="jbm-searchform">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>-->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="search-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <form class="form-inline pull-right" method="post" >
                                <div class="form-group m-r-4">
                                    <input type="text" class="form-control" name="s" id="header-search-input" placeholder="Search here..." />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="jbm-search-sm-btn">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end menu -->
        <!-- start mobile menu -->
        <div class="jbm-menu-wrap">
            <div class="jbm-mobile-logo-wrap">
                <div class="jbm-logo">
                    <a href="index.html">
                        <img src="{{ asset('frontend_assets/img/logo2.png') }}" alt="Esa Unggul Logo" class="img-responsive" />
                    </a>
                </div>
                <div class="jbm-menu-icon pull-right">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 612 612" xml:space="preserve"><g><g id="cross"><g><polygon points="612,36.004 576.521,0.603 306,270.608 35.478,0.603 0,36.004 270.522,306.011 0,575.997 35.478,611.397 306,341.411 576.521,611.397 612,575.997 341.459,306.011 " fill="#454545"/></g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                    </a>
                </div>
            </div>
            <div class="jbm-mobile-menu-wrap">
                <ul class="jbm-mobile-menu">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">Profil</a>
                            </li>
                            <li>
                                <a href="#">Lowongan Pekerjaan</a>
                            </li>
                            <li class="mobile-hasmenu">
                                <a href="#">Prosedur</a>
                                    <ul class="mobile-submenu">
                                        <li class="jbm-pg-hd">
                                            <h3>Mahasiswa atau Alumni</h3>
                                        </li>
                                        <li>
                                            <a href="candidate-information.html">Pendaftaran</a>
                                        </li>
                                        <li>
                                            <a href="candidate-message.html">Pencarian Lowongan</a>
                                        </li>
                                        <li>
                                            <a href="candidate-message.html">Melamar Pekerjaan</a>
                                        </li>
                                        <li>
                                            <a href="candidate-message.html">Mengunggah Dokumen</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <ul>
                                        <li class="jbm-pg-hd">
                                            <h3>Perusahaan</h3>
                                        </li>
                                        <li>
                                            <a href="candidate-search.html">Pendaftaran</a>
                                        </li>
                                        <li>
                                            <a href="candidate-search-with-map.html">Membuat Lowongan</a>
                                        </li>
                                        <li>
                                            <a href="candidate-search-with-filter.html">Melihat pelamar</a>
                                        </li>
                                    </ul>
                            </li>
                </ul>
            </div>
            <div class="jbm-mobile-bottom-wrap">
                <div class="jbm-mobile-bottom-wrap-inner clearfix">
                    <div class="mobile-username pull-left">
                        <a href="#" class="mob-logout">LOGOUT</a>
                        <br />
                        <a href="#" class="mob-user">John Doe</a>
                    </div>
                    <div class="mobile-user-image pull-right">
                        <img src="{{ asset('frontend_assets/img/user-1.jpg') }}"  alt="user-image" />
                    </div>
                </div>
            </div>
        </div>
        <!-- end mobile menu -->
    </header>
    <!-- start banner -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="jbm-banner-text text-center">
                        <div class="jbm-ban-txt-line-1">
                            <h1>
                                MOBILE CAMPUS HIRING CAREER CENTER UNIVERSITAS ESA UNGGGUL
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
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="jbm-sch-inner margin-top-85-minus">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="keyword" name="s" placeholder="Search Your Keyword" />
                                    <p>(Example: web design, seo analyst)</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <select class="jbm-s-category jbm-select-hide-search" name="category" id="jbm-s-category">
                                        <option value="">Category</option>
                                        <option value="accounting">Accounting</option>
                                        <option value="administration">Administration</option>
                                        <option value="banking">Banking</option>
                                        <option value="construction">Construction</option>
                                        <option value="construction">Construction</option>
                                        <option value="construction">Construction</option>
                                        <option value="construction">Construction</option>
                                        <option value="construction">Construction</option>
                                    </select>
                                    <p>(Example: designer, legal, education)</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Location" />
                                    <p>(Example: Melbourne, Florida)</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group ">
                                    <input type="submit" class="jbm-button jbm-button-3" id="search-btn" name="search" value="Search Jobs" />
                                    <p class="text-center"><a href="#">More Search Options</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                        <a href="#">{{ $low->tbllowongan_detil->tblkota->kota_name }}</a>
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
    <footer>
        <div class="footer-widget-container padding-top-115 padding-bottom-70">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="widget widget-text">
                            <img src="{{ asset('frontend_assets/img/logo2.png') }}" alt="footer-logo" class="img-responsive margin-bottom-30" />
                            <p>
                                JobMarket is a platform that has been designed to help both employers and candidates achieve success. We have more than 20 years of experience and we are growing stronger each and every day.
                                <a href="#">Read More..</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="widget ">
                            <h6 class="uppercase margin-top-0 margin-bottom-55">need help?</h6>
                            <ul class="widget-links">
                                <li>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i><a href="about-us.html">About Us</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="how-it-works.html">How it Works</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="faqs.html">FAQ</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="terms-and-conditions.html">Terms & Conditions</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="contact-us.html">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                         <div class="widget ">
                            <h6 class="uppercase margin-top-0 margin-bottom-55">Useful Links</h6>
                            <ul class="widget-links">
                                <li>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i><a href="404.html">404 Error</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="pricing-plans.html">Pricing Plans</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="career-jobmarket.html">Career at JobMarket</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="sitemap.html">Sitemap</a>
                                </li>
                            </ul>
                    </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="widget last-widget">
                            <h6 class="uppercase margin-top-0 margin-bottom-55">Subscribe to our Newsletter</h6>
                            <div class="widget-subscribe">
                                <div class="form-group subsribe-email">
                                    <label for="subs-email" class="subs-email-label">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 14 14" xml:space="preserve" ><g><g><path d="M7,9L5.268,7.484l-4.952,4.245C0.496,11.896,0.739,12,1.007,12h11.986 c0.267,0,0.509-0.104,0.688-0.271L8.732,7.484L7,9z" fill="#c4c4c4"/><path d="M13.684,2.271C13.504,2.103,13.262,2,12.993,2H1.007C0.74,2,0.498,2.104,0.318,2.273L7,8 L13.684,2.271z" fill="#c4c4c4"/><polygon points="0,2.878 0,11.186 4.833,7.079 " fill="#c4c4c4"/><polygon points="9.167,7.079 14,11.186 14,2.875 " fill="#c4c4c4"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                                    </label>
                                    <input type="email" name="bs-suemail" id="subs-email" class="form-control" placeholder="Enter your email address" />
                                </div>
                                <div class="form-group">
                                   <input type="submit" class="jbm-button jbm-button-3" id="subscribe-btn" name="subscribe-btn" value="Subscribe">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-bar main-2nd-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 hidden-xs hidden-sm text-left">
                        <p>Made with <i class="fa fa-heart"></i> by PSD_Market. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-2 text-center back-top">
                        <a href="#" class="back-top-button">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a href="#" class="back-top-link">Back to Top</a>
                    </div>
                    <div class="col-md-5 text-right">
                        <ul class="list-none jbm-social-icon-1 ">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-5 hidden-md hidden-lg text-center">
                        <p>Made with <i class="fa fa-heart"></i> by PSD_Market. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Spinner -->
     <div class="jbm-spinner">
        <div class="spinner-content">
            <div class="loader-circle"></div>
            <div class="loader-line-mask">
                <div class="loader-line"></div>
            </div>
        </div>
    </div>
     <!-- Spinner end here -->


    <div class="apply-job-popup">
        <div class="popup-overlay"></div>
        <!-- Candidate popup -->
        <div class="popup">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-md-5 jbm-login-side applyy">
                                <i class="fa fa-lightbulb-o margin-bottom-50" aria-hidden="true"></i>
                                <span class="section-tit-line"></span>
                                <h3 class="margin-bottom-60">Apply for Job</h3>
                                <ul class="new-signup">
                                    <li>
                                        <a href="#">New User? </a>
                                    </li>
                                    <li>
                                        <a href="#">Sign Up</a>
                                    </li>
                                </ul>

                                <ul class="jbm-social-icons">
                                    <li>
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                        </div>
                        <div class="col-md-7 jbm-form">
                            <div class="jbm-field margin-top-20 register">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name4" class="form-control">
                                        <label for="name4">First Name*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="last-name" id="last-name4" class="form-control">
                                        <label for="last-name4">Last Name*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="email-address" id="email-address4" class="form-control">
                                        <label for="email-address4">Email Address*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="number" id="number4" class="form-control">
                                        <label for="number4">Phone Number*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                     <div class="form-group">
                                        <textarea name="message" id="number5" class="form-control"></textarea>
                                        <label for="number5">Message*</label>
                                    </div>
                                </div>
                                <div class="g-recaptcha" data-sitekey="6LdcpCoUAAAAAH7ei-XX2bHUWul6Ppl5wYm1Y7Ne"></div>
                                <a href="#" class="jbm-button jbm-button-3 jbm-hover margin-bottom-15   ">Apply for Job</a>
                                <div class="terms">
                                    <input type="checkbox" id="c1" name="cc">
                                    <label for="c1"><span></span></label>
                                    <small>I have read and agree with <a href="#">Terms & Conditions</a></small>
                                </div>
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

    <div class="jbm-login-popup">
        <div class="popup-overlay"></div>
        <div class="container">
            <div class="popup">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-md-5 jbm-login-side">
                                    <i class="fa fa-lightbulb-o margin-bottom-50" aria-hidden="true"></i>
                                    <span class="section-tit-line"></span>
                                    <h3 class="margin-bottom-60">Login</h3>
                                    <ul>
                                        <li>
                                            <a href="#">Not yet registered? </a>
                                        </li>
                                        <li>
                                            <a href="#">Register Here</a>
                                        </li>
                                    </ul>

                                    <ul class="jbm-social-icons">
                                        <li>
                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                            </div>
                            <div class="col-md-7 jbm-form">
                                <ul class="jbm-login-form padding-top-40">
                                    <li class="candidate selected">
                                        <a href="#">Candidate</a>
                                    </li>
                                    <li  class="employer">
                                        <a href="#">Employer</a>
                                    </li>
                                </ul>
                                <div class="jbm-field login-style margin-top-60">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="email-address" id="email-address" class="form-control">
                                            <label for="email-address">Email Address*</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="new-pass" id="new-pass2" class="form-control">
                                            <label for="new-pass2">Enter Password*</label>
                                        </div>
                                    </div>
                                    <a href="#" class="jbm-button jbm-button-3 jbm-hover margin-bottom-40 margin-top-20">Login</a>
                                    <div class="row margin-bottom-70">
                                        <div class="col-md-7">
                                           <div class="terms style3">
                                                <input type="checkbox" id="c4" name="cc">
                                                <label for="c4"><span></span></label>
                                                <small>Keep me logged in</small>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <a href="#" class="forgot">Forgot Password?</a>
                                        </div>
                                    </div>

                                    <div class="row margin-bottom-65">
                                        <div class="col-md-5 or">
                                        </div>
                                        <div class="col-md-2">
                                            <div class="jbm-or">
                                                <span class="or">OR</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 or">
                                        </div>
                                    </div>

                                    <div class="jbm-social-icons-2 style3">
                                        <ul>
                                            <li class="facebook">
                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="google-plus">
                                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="linkedin">
                                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="close-btn">
                                <i class="fa fa-close"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--jbm-login-popup end-->

    <div class="jbm-can-register-popup">
        <div class="popup-overlay"></div>
        <div class="popup">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-md-5 jbm-login-side">
                                <i class="fa fa-lightbulb-o margin-bottom-50" aria-hidden="true"></i>
                                <span class="section-tit-line"></span>
                                <h3 class="margin-bottom-60">Register</h3>
                                <ul>
                                    <li>
                                        <a href="#">Already have an account? </a>
                                    </li>
                                    <li>
                                        <a href="#">Login Here</a>
                                    </li>
                                </ul>

                                <ul class="jbm-social-icons">
                                    <li>
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                        </div>
                        <div class="col-md-7 jbm-form regis">
                            <ul class="jbm-login-form padding-top-30">
                                <li class="candidate selected" data-tab="tab1">
                                    <a href="#">Candidate</a>
                                </li>
                                <li class="employer" data-tab="tab2">
                                    <a href="#">Employer</a>
                                </li>
                            </ul>
                            <div class="jbm-field current margin-top-60 register" id="tab1">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control">
                                        <label for="name">First Name*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="last-name" id="last-name" class="form-control">
                                        <label for="last-name">Last Name*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="email-address" id="email-address2" class="form-control">
                                        <label for="email-address2">Email Address*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="new-pass" id="new-pass3" class="form-control">
                                        <label for="new-pass3">Enter Password*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="confirm-pass" id="confirm-pass2" class="form-control">
                                        <label for="confirm-pass2">Password Confirm*</label>
                                    </div>
                                </div>
                                <img class="margin-top-10" src="{{ asset('frontend_assets/img/register-img.jpg') }}" alt="">
                                <div class="jbm-cand-register">
                                    <a href="#" class="jbm-button jbm-button-3 jbm-hover">Register</a>
                                </div>
                                <div class="terms style2">
                                    <input type="checkbox" id="c5" name="cc">
                                    <label for="c5"><span></span></label>
                                    <small>I have read and agree with <a href="#">Terms & Conditions</a></small>
                                </div>
                            </div>
                            <div class="jbm-field margin-top-60 register" id="tab2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="com-name" id="com-name" class="form-control">
                                        <label for="com-name">Company Name*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="address" id="address" class="form-control">
                                        <label for="address">Company Address*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="email-address" id="email-address3" class="form-control">
                                        <label for="email-address3">Email Address*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="new-pass" id="new-pass4" class="form-control">
                                        <label for="new-pass4">Enter Password*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="confirm-pass" id="confirm-pass3" class="form-control">
                                        <label for="confirm-pass3">Password Confirm*</label>
                                    </div>
                                </div>
                                <img class="margin-top-10" src="{{ asset('frontend_assets/img/register-img.jpg') }}" alt="">
                                <div class="jbm-cand-register">
                                    <a href="#" class="jbm-button jbm-button-3 jbm-hover">Register</a>
                                </div>
                                <div class="terms style2">
                                    <input type="checkbox" id="c6" name="cc">
                                    <label for="c6"><span></span></label>
                                    <small>I have read and agree with <a href="#">Terms & Conditions</a></small>
                                </div>
                            </div>
                        </div>
                        <div class="close-btn">
                            <i class="fa fa-close"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--jbm-can-register-popup end-->


    <div class="jbm-overlay jbm-2nd-bg"></div>
    <!-- Scripts -->
    <script src="{{ asset('frontend_assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets/js/counter.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/lib/slick/slick.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/lib/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/js/custom.js') }}" type="text/javascript"></script>

</body>

</html>
