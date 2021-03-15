<!DOCTYPE html>
<html class="loading" data-textdirection="rtl" lang="ar">
<!-- BEGIN: Head-->
<head>
    @include('BaseApp::partials.meta')

    <!-- <link rel="preload" as="font" href="fonts/ionicons.ttf" crossorigin="anonymous"> -->
        <!-- Compiled Vendors CSS -->
        <link rel="stylesheet" href="/css/{{lang()}}_vendors.css">
        <!-- Empty APP CSS -->
        <link rel="stylesheet" href="/css/app.css">




    @stack('css')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-col=""
      data-menu="vertical-menu-modern" data-open="click" >

@include('BaseApp::partials.header')
@include('BaseApp::partials.navigation')

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper" id="app">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    @include('BaseApp::partials.flash_messages')
                    @include('BaseApp::partials.breadcrumb')
                </div>
            </div>
            @yield('content')
        </div>

    </div>
</div>
<!-- END: Content-->

@include('BaseApp::partials.footer')


<!-- BEGIN: Front End Vendor JS-->
<script src="/js/front-vendors.min.js"></script>
<!-- BEGIN: Compiled JS Files Vendor JS-->
<script src="/js/notify.min.js"></script>
<script src="/js/vendors.js"></script>
<script src="/js/scripts.js"></script>
<!-- BEGIN: Empty JS File TO Be Customized in it -->
<script src="/js/app.js"></script>
<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({width: 14, height: 14});
        }
    })
</script>





@stack('js')
</body>
<!-- END: Body-->
</html>
