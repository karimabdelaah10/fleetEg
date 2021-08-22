<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

    <head>
        @include('BaseApp::partials.meta')
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="preload" as="font" href="fonts/ionicons.ttf" crossorigin="anonymous"> -->
            <!-- Vendors CSS -->
            <link rel="stylesheet" href="/css/iframe-vendors.css">
            <!-- APP CSS -->
            <link rel="stylesheet" href="/css/iframe-app.css">

            @if(lang() == 'ar')
                <style>
                    table.dataTable thead th.sorting::after, table.dataTable thead th.sorting_asc::after, table.dataTable thead th.sorting_desc::after, table.dataTable thead td.sorting::after, table.dataTable thead td.sorting_asc::after, table.dataTable thead td.sorting_desc::after {
                        right: unset;
                        left: 8px;
                    }
                    table.dataTable thead th.sorting::before, table.dataTable thead th.sorting_asc::before, table.dataTable thead th.sorting_desc::before, table.dataTable thead td.sorting::before, table.dataTable thead td.sorting_asc::before, table.dataTable thead td.sorting_desc::before {
                        right: unset;
                        left: 8px;
                    }
                </style>
            @endif
            @stack('css')
    </head>

    <body  class="success-page">
        <!-- slim-header -->
        <div class="slim-mainpanel slim-mainpanel-table">

                @yield('content')
                <!-- section-wrapper -->
            <!-- container -->
        </div>
        @stack('js')
    </body>

</html>
