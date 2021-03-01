<!DOCTYPE html>
<html class="loading" data-textdirection="rtl" lang="ar">
<!-- BEGIN: Head-->
<head>
    @include('BaseApp::partials.meta')
    @include('BaseApp::partials.css')
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
@include('BaseApp::partials.js')
@stack('js')
</body>
<!-- END: Body-->
</html>
