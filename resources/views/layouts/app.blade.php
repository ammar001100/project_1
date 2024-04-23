<!doctype html>
<html lang="ar">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap4 Dashboard Template">
    <meta name="author" content="ParkerThemes">
    <link rel="shortcut icon" href="{{ asset('asset/img/fav.png') }}" />

    <!-- Title -->
    <title>@yield('title')</title>


    <!-- *************
   ************ Common Css Files *************
  ************ -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">

    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="{{ asset('asset/fonts/style.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('asset/css/main.css') }}">
    @yield('css')

    <!-- *************
   ************ Vendor Css Files *************
  ************ -->
    <!-- DateRange css -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/daterange/daterange.css') }}" />
    <!-- jQcloud Keywords css -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/jqcloud/jqcloud.css') }}" />

</head>

<body>

    <!--

 Loading starts
  <div id="loading-wrapper">
  <button class="btn btn-danger" type="button">
  <span class="spinner-grow spinner-grow-sm"></span>
  ... جاري التحميل
  </button>
  </div>
  Loading ends -->

    <!-- *************
   ************ Header section start *************
  ************* -->

    <!-- Header start -->
    @include('include.app.header')
    <!-- Header end -->

    <!-- Screen overlay start -->
    <div class="screen-overlay"></div>
    <!-- Screen overlay end -->

    <!-- Quicklinks box start -->
    <div class="quick-links-box">
        <div class="quick-links-header">
            روابط سريعة
            <a href="#" class="quick-links-box-close">
                <i class="icon-circle-with-cross"></i>
            </a>
        </div>

        <div class="quick-links-wrapper">
            <div class="fullHeight">
                <div class="quick-links-body">
                    <div class="container-fluid p-0">
                        <div class="row less-gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <a href="" class="quick-tile blue">
                                    <i class="icon-file-text"></i>
                                    Documents
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="" class="quick-tile secondary">
                                    <i class="icon-pie-chart1"></i>
                                    CRM
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="ecommerce-dashboard.html" class="quick-tile blue">
                                    <i class="icon-shopping-cart1"></i>
                                    Ecommerce
                                </a>
                            </div>
                        </div>
                        <div class="row less-gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <a href="gallery2.html" class="quick-tile photos lg">
                                    Photos
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="tasks.html" class="quick-tile">
                                    <i class="icon-check-circle"></i>
                                    Tasks
                                </a>
                                <a href="calendar-external-draggable.html" class="quick-tile blue">
                                    <i class="icon-calendar1"></i>
                                    Events
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="chat.html" class="quick-tile blue">
                                    <i class="icon-message-circle"></i>
                                    Chat
                                </a>
                                <a href="default-layout.html" class="quick-tile">
                                    <i class="icon-grid"></i>
                                    Layout
                                </a>
                            </div>
                        </div>
                        <div class="row less-gutters">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="custom-alerts.html" class="quick-tile secondary">
                                    <i class="icon-alert-triangle"></i>
                                    Alerts
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="google-maps.html" class="quick-tile blue">
                                    <i class="icon-map-pin"></i>
                                    Maps
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="https://www.gmail.com" target="_blank" class="quick-tile white">
                                    <i class="icon-drafts"></i>
                                    Gmail
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="https://www.youtube.com" target="_blank" class="quick-tile secondary">
                                    <i class="icon-youtube"></i>
                                    Youtube
                                </a>
                            </div>
                        </div>
                        <div class="row less-gutters">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="user-profile.html" class="quick-tile">
                                    <i class="icon-account_circle"></i>
                                    Profile
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="contacts.html" class="quick-tile">
                                    <i class="icon-phone"></i>
                                    Contacts
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="account-settings.html" class="quick-tile">
                                    <i class="icon-settings1"></i>
                                    Settings
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="login.html" class="quick-tile">
                                    <i class="icon-lock2"></i>
                                    Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quicklinks box end -->

    <!-- Quick settings start -->
    <div class="quick-settings-box">
        <div class="quick-settings-header">
            <div class="date-container">اليوم <span class="date" id="today-date"></span></div>
            <a href="#" class="quick-settings-box-close">
                <i class="icon-circle-with-cross"></i>
            </a>
        </div>
        <div class="quick-settings-body">
            <div class="fullHeight">
                <div class="quick-setting-list">
                    <h6 class="title">اشعارات</h6>
                    <ul class="list-items">
                        <li>
                            <div class="list-title">عمار ابراهيم</div>
                            <div class="list-location">02:30 PM</div>
                        </li>
                    </ul>
                </div>
                <div class="quick-setting-list">
                    <h6 class="title">مزكرات</h6>
                    <ul class="list-items">
                        <li>
                            <div class="list-title">عمار ابراهيم</div>
                            <div class="list-location">03:15 PM</div>
                        </li>

                    </ul>
                </div>
                <div class="quick-setting-list">
                    <h6 class="title">Quick Settings</h6>
                    <ul class="set-priority-list">
                        <li>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" checked id="systemUpdates">
                                <label class="custom-control-label" for="systemUpdates">System Updates</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="noti">
                                <label class="custom-control-label" for="noti">Notifications</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick settings end -->

    <!-- *************
   ************ Header section end *************
  ************* -->


    <!-- Container fluid start -->
    <div class="container-fluid">


        <!-- Navigation start -->
        @include('include.app.navbar')
        <!-- Navigation end -->


        <!-- *************
    ************ Main container start *************
   ************* -->
        <div class="main-container">


            <!-- Page header start -->
            <div class="page-header" dir="rtl">
                <ol class="breadcrumb">
                    @yield('breadcrumb')
                </ol>
            </div>
            <!-- Page header end -->


            <!-- Content wrapper start -->
            <div class="content-wrapper">

                @yield('content')

            </div>
            <!-- Content wrapper end -->


        </div>
        <!-- *************
    ************ Main container end *************
   ************* -->


        <!-- Footer start -->
        <footer class="main-footer text-center">© Ammar 20{{ date('y') }}</footer>
        <!-- Footer end -->


    </div>
    <!-- Container fluid end -->

    <!-- *************
   ************ Required JavaScript Files *************
  ************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/js/moment.js') }}"></script>


    <!-- *************
   ************ Vendor Js Files *************
  ************* -->
    <!-- Slimscroll JS -->
    <script src="{{ asset('asset/vendor/slimscroll/slimscroll.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/slimscroll/custom-scrollbar.js') }}"></script>

    <!-- Daterange -->
    <script src="{{ asset('asset/vendor/daterange/daterange.js') }}"></script>
    <script src="{{ asset('asset/vendor/daterange/custom-daterange.js') }}"></script>

    <!-- Main Js Required -->
    <script src="{{ asset('asset/js/main.js') }}"></script>
    @yield('script')

</body>

</html>
