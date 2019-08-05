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
    <style>
    .swal2-popup {
        font-size: 1.4rem !important;
    }
    </style>
    @yield('css')

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
                                <a href="tel:+0001234567890"><i class="fa fa-phone"></i>021 – 5674223 ext. 357</a>
                            </li>
                            <li>
                                <a href="mailto:careercenter.ueu@esaunggul.ac.id"><i class="fa fa-envelope"></i>careercenter.ueu@esaunggul.ac.id</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 text-right hidden-xs hidden-sm">
                        <ul class="dis-inline list-none  jbm-topbar-login">
                            @if (Auth::guest())
                            <li>
                                <a class="" href="{{ route('login') }}">Login</a>
                            </li>
                            <li>
                                <a class="" href="{{ route('register') }}">Register</a>
                            </li>
                            @else
                            <li>
                                <a class="" href="{{ route('myaccount.index') }}">Akun Saya</a>
                            </li>
                            <li>
                                <a class="" href="{{ route('logout') }}">Logout</a>
                            </li>
                            @endif
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
                                    <a href="{{ route('index') }}">Home</a>
                                </li>
                                <li>
                                    <a href="#">Profil</a>
                                </li>
                                <li>
                                    <a href="{{ route('job.all') }}">Lowongan Pekerjaan</a>
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
                                <a href="{{ route('index') }}">Home</a>
                            </li>
                            <li>
                                <a href="#">Profil</a>
                            </li>
                            <li>
                                <a href="{{ route('job.all') }}">Lowongan Pekerjaan</a>
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
                        <a href="#" class="mob-logout">Logout</a>
                        <br />
                        <a href="#" class="mob-user">Akun Saya</a>
                    </div>
                    <div class="mobile-user-image pull-right">
                        <img src="{{ asset('frontend_assets/img/user-1.jpg') }}"  alt="user-image" />
                    </div>
                </div>
            </div>
        </div>
        <!-- end mobile menu -->
    </header>
    @yield('content')
    <footer>
        <div class="footer-widget-container padding-top-115 padding-bottom-70">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="widget widget-text">
                            <img src="{{ asset('frontend_assets/img/logo2.png') }}" alt="footer-logo" class="img-responsive margin-bottom-30" />
                            <p>
                                    Career Center Universitas Esa Unggul adalah sebuah wadah yang bertujuan untuk mempertemukan Perusahaan yang membutuhkan tenaga kerja dengan alumni Universitas Esa Unggul (UEU) yang siap bekerja.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="widget ">
                                    <h6 class="uppercase margin-top-0 margin-bottom-55">Butuh Bantuan?</h6>
                                    <ul class="widget-links">
                                        <li>
                                            <i class="fa fa-angle-right" aria-hidden="true"></i><a href="about-us.html">Tentang Career Center</a>
                                        </li>
                                        <li>
                                             <i class="fa fa-angle-right" aria-hidden="true"></i><a href="contact-us.html">Kontak Career Center</a>
                                        </li>
                                    </ul>
                                </div>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                         <div class="widget ">
                            <h6 class="uppercase margin-top-0 margin-bottom-55">Prosedur</h6>
                            <ul class="widget-links">
                                <li>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i><a href="404.html">Pendaftaran Mahasiswa</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="pricing-plans.html">Pendaftaran Perusahaan</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="career-jobmarket.html">Melamar Pekerjaan</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="sitemap.html">Mengunggah Dokumen</a>
                                </li>
                            </ul>
                    </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">

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
    <div class="jbm-overlay jbm-2nd-bg"></div>
    <!-- Scripts -->
    <script src="{{ asset('frontend_assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets/js/counter.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/lib/slick/slick.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/lib/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/js/custom.js') }}" type="text/javascript"></script>
    @include('sweetalert::alert')
    @yield('js')
</body>

</html>
