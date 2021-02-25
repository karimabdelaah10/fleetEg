<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

    <head>
        @include('BaseApp::partials.meta')
        @include('BaseApp::partials.css')
        @stack('css')
    </head>

    <body>
        <div class="d-md-flex flex-row-reverse">
            @include('BaseApp::partials.flash_messages')
            @yield('content')
        </div>
        <!-- d-flex -->
        <!-- signin-wrapper -->
        @include('BaseApp::partials.js') @stack('js')
    </body>

</html>
