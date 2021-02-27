<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}"
      dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

    <head>
        @include('BaseApp::partials.meta')
        @include('BaseApp::partials.css') @stack('css')
    </head>

    <body>
        @include('BaseApp::partials.header')
        <!-- slim-header -->
        @include('BaseApp::partials.navigation')
        <!-- slim-navbar -->
        <div class="slim-mainpanel">
            <div class="container">
                @include('BaseApp::partials.breadcrumb')
                @include('BaseApp::partials.flash_messages')
                <!-- section-wrapper -->
                @yield('content')
                <!-- section-wrapper -->
            </div>
            <!-- container -->
        </div>
        <!-- slim-mainpanel -->
        <!-- slim-footer -->
        @include('BaseApp::partials.footer')
        @include('BaseApp::partials.js')
        @stack('js')
    </body>

</html>

<!DOCTYPE html>
<html class="loading" data-textdirection="rtl" lang="ar">
<!-- BEGIN: Head-->
<head>

    <!-- BEGIN: Vendor CSS-->
    <link href="css/vendors-rtl.min.css" rel="stylesheet" type="text/css">
    <link href="css/charts/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="css/extensions/toastr.min.css" rel="stylesheet" type="text/css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link href="css-rtl/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css-rtl/bootstrap-extended.min.css" rel="stylesheet" type="text/css">
    <link href="css-rtl/colors.min.css" rel="stylesheet" type="text/css">
    <link href="css-rtl/components.min.css" rel="stylesheet" type="text/css">
    <link href="css-rtl/themes/dark-layout.min.css" rel="stylesheet" type="text/css">
    <link href="css-rtl/themes/bordered-layout.min.css" rel="stylesheet" type="text/css">
    <link href="css-rtl/themes/semi-dark-layout.min.css" rel="stylesheet" type="text/css">

    <!-- BEGIN: Page CSS-->
    <link href="css-rtl/core/menu/menu-types/vertical-menu.min.css" rel="stylesheet" type="text/css">
    <link href="css-rtl/pages/dashboard-ecommerce.min.css" rel="stylesheet" type="text/css">
    <link href="css-rtl/plugins/charts/chart-apex.min.css" rel="stylesheet" type="text/css">
    <link href="css-rtl/plugins/extensions/ext-component-toastr.min.css" rel="stylesheet" type="text/css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link href="css-rtl/custom-rtl.min.css" rel="stylesheet" type="text/css">
    <link href="css-rtl/style-rtl.css" rel="stylesheet" type="text/css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-col=""
      data-menu="vertical-menu-modern" data-open="click">

<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item">
                    <a class="nav-link menu-toggle" href="javascript:void(0);">
                        <i class="ficon" data-feather="menu"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link nav-link-style">
                        <i class="ficon" data-feather="moon"></i>
                    </a>
                </li>
                <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon"
                                                                                       data-feather="search"></i></a>
                    <div class="search-input">
                        <div class="search-input-icon"><i data-feather="search"></i></div>
                        <input class="form-control input" data-search="search" placeholder="Explore Vuexy..."
                               tabindex="-1"
                               type="text">
                        <div class="search-input-close"><i data-feather="x"></i></div>
                        <ul class="search-list search-list-main"></ul>
                    </div>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown dropdown-cart mr-25">
                <a class="nav-link" data-toggle="dropdown" href="">
                    <i class="ficon" data-feather="dollar-sign"></i><span
                        class="badge badge-pill badge-primary badge-up cart-item-count">63084</span></a>
            </li>
            <li class="nav-item dropdown dropdown-cart mr-25"><a class="nav-link" data-toggle="dropdown"
                                                                 href="javascript:void(0);"><i class="ficon"
                                                                                               data-feather="shopping-cart"></i><span
                        class="badge badge-pill badge-primary badge-up cart-item-count">6</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 mr-auto">My Cart</h4>
                            <div class="badge badge-pill badge-light-primary">4 Items</div>
                        </div>
                    </li>
                    <li class="scrollable-container media-list">
                        <div class="media align-items-center"><img alt="donuts"
                                                                   class="d-block rounded mr-1"
                                                                   src="images/pages/eCommerce/1.png"
                                                                   width="62">
                            <div class="media-body"><i class="ficon cart-item-remove" data-feather="x"></i>
                                <div class="media-heading">
                                    <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html">
                                            Apple watch 5</a></h6><small class="cart-item-by">By Apple</small>
                                </div>
                                <div class="cart-item-qty">
                                    <div class="input-group">
                                        <input class="touchspin-cart" type="number" value="1">
                                    </div>
                                </div>
                                <h5 class="cart-item-price">$374.90</h5>
                            </div>
                        </div>
                        <div class="media align-items-center"><img alt="donuts"
                                                                   class="d-block rounded mr-1"
                                                                   src="images/pages/eCommerce/7.png"
                                                                   width="62">
                            <div class="media-body"><i class="ficon cart-item-remove" data-feather="x"></i>
                                <div class="media-heading">
                                    <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html">
                                            Google Home Mini</a></h6><small class="cart-item-by">By Google</small>
                                </div>
                                <div class="cart-item-qty">
                                    <div class="input-group">
                                        <input class="touchspin-cart" type="number" value="3">
                                    </div>
                                </div>
                                <h5 class="cart-item-price">$129.40</h5>
                            </div>
                        </div>
                        <div class="media align-items-center"><img alt="donuts"
                                                                   class="d-block rounded mr-1"
                                                                   src="images/pages/eCommerce/2.png"
                                                                   width="62">
                            <div class="media-body"><i class="ficon cart-item-remove" data-feather="x"></i>
                                <div class="media-heading">
                                    <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html">
                                            iPhone 11 Pro</a></h6><small class="cart-item-by">By Apple</small>
                                </div>
                                <div class="cart-item-qty">
                                    <div class="input-group">
                                        <input class="touchspin-cart" type="number" value="2">
                                    </div>
                                </div>
                                <h5 class="cart-item-price">$699.00</h5>
                            </div>
                        </div>
                        <div class="media align-items-center"><img alt="donuts"
                                                                   class="d-block rounded mr-1"
                                                                   src="images/pages/eCommerce/3.png"
                                                                   width="62">
                            <div class="media-body"><i class="ficon cart-item-remove" data-feather="x"></i>
                                <div class="media-heading">
                                    <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html">
                                            iMac Pro</a></h6><small class="cart-item-by">By Apple</small>
                                </div>
                                <div class="cart-item-qty">
                                    <div class="input-group">
                                        <input class="touchspin-cart" type="number" value="1">
                                    </div>
                                </div>
                                <h5 class="cart-item-price">$4,999.00</h5>
                            </div>
                        </div>
                        <div class="media align-items-center"><img alt="donuts"
                                                                   class="d-block rounded mr-1"
                                                                   src="images/pages/eCommerce/5.png"
                                                                   width="62">
                            <div class="media-body"><i class="ficon cart-item-remove" data-feather="x"></i>
                                <div class="media-heading">
                                    <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html">
                                            MacBook Pro</a></h6><small class="cart-item-by">By Apple</small>
                                </div>
                                <div class="cart-item-qty">
                                    <div class="input-group">
                                        <input class="touchspin-cart" type="number" value="1">
                                    </div>
                                </div>
                                <h5 class="cart-item-price">$2,999.00</h5>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown-menu-footer">
                        <div class="d-flex justify-content-between mb-1">
                            <h6 class="font-weight-bolder mb-0">Total:</h6>
                            <h6 class="text-primary font-weight-bolder mb-0">$10,999.00</h6>
                        </div>
                        <a class="btn btn-primary btn-block" href="app-ecommerce-checkout.html">Checkout</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-notification mr-25"><a class="nav-link" data-toggle="dropdown"
                                                                         href="javascript:void(0);"><i class="ficon"
                                                                                                       data-feather="bell"></i><span
                        class="badge badge-pill badge-danger badge-up">5</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 mr-auto">Notifications</h4>
                            <div class="badge badge-pill badge-light-primary">6 New</div>
                        </div>
                    </li>
                    <li class="scrollable-container media-list"><a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar"><img alt="avatar" height="32"
                                                             src="images/portrait/small/avatar-s-15.jpg" width="32"></div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">Congratulation Sam 🎉</span>winner!
                                    </p><small class="notification-text"> Won the monthly best seller badge.</small>
                                </div>
                            </div>
                        </a><a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar"><img alt="avatar" height="32"
                                                             src="images/portrait/small/avatar-s-3.jpg" width="32"></div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">New message</span>&nbsp;received
                                    </p><small class="notification-text"> You have 10 unread messages</small>
                                </div>
                            </div>
                        </a><a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar bg-light-danger">
                                        <div class="avatar-content">MD</div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">Revised Order 👋</span>&nbsp;checkout
                                    </p><small class="notification-text"> MD Inc. order updated</small>
                                </div>
                            </div>
                        </a>
                        <div class="media d-flex align-items-center">
                            <h6 class="font-weight-bolder mr-auto mb-0">System Notifications</h6>
                            <div class="custom-control custom-control-primary custom-switch">
                                <input checked="" class="custom-control-input" id="systemNotification" type="checkbox">
                                <label class="custom-control-label" for="systemNotification"></label>
                            </div>
                        </div>
                        <a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar bg-light-danger">
                                        <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i></div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">Server down</span>&nbsp;registered
                                    </p><small class="notification-text"> USA Server is down due to hight CPU
                                        usage</small>
                                </div>
                            </div>
                        </a><a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar bg-light-success">
                                        <div class="avatar-content"><i class="avatar-icon" data-feather="check"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">Sales report</span>&nbsp;generated
                                    </p><small class="notification-text"> Last month sales report generated</small>
                                </div>
                            </div>
                        </a><a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar bg-light-warning">
                                        <div class="avatar-content"><i class="avatar-icon"
                                                                       data-feather="alert-triangle"></i></div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">High memory</span>&nbsp;usage
                                    </p><small class="notification-text"> BLR Server using high memory</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block" href="javascript:void(0)">Read
                            all notifications</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-user">
                <a aria-expanded="false"
                   aria-haspopup="true"
                   class="nav-link dropdown-toggle dropdown-user-link"
                   data-toggle="dropdown" href="javascript:void(0);"
                   id="dropdown-user">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name font-weight-bolder">John Doe</span>
                        <span class="user-status">Admin</span>
                    </div>
                    <span class="avatar">
                    <img alt="avatar" class="round" height="40"
                         src="images/portrait/small/avatar-s-11.jpg" width="40">
                    <span class="avatar-status-online"></span>
                </span>
                </a>
                <div aria-labelledby="dropdown-user" class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="page-profile.html">
                        <i class="mr-50" data-feather="user"></i> Profile</a>
                    <a class="dropdown-item" href="{{url('/')}}">
                        <i class="mr-50" data-feather="power"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center"><a href="javascript:void(0);">
            <h6 class="section-label mt-75 mb-0">Files</h6></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                                   href="app-file-manager.html">
            <div class="d-flex">
                <div class="mr-75"><img alt="png" height="32" src="images/icons/xls.png"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing
                        Manager</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;17kb</small></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                                   href="app-file-manager.html">
            <div class="d-flex">
                <div class="mr-75"><img alt="png" height="32" src="images/icons/jpg.png"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                        Developer</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;11kb</small></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                                   href="app-file-manager.html">
            <div class="d-flex">
                <div class="mr-75"><img alt="png" height="32" src="images/icons/pdf.png"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing
                        Manager</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;150kb</small></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                                   href="app-file-manager.html">
            <div class="d-flex">
                <div class="mr-75"><img alt="png" height="32" src="images/icons/doc.png"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;256kb</small></a></li>
    <li class="d-flex align-items-center"><a href="javascript:void(0);">
            <h6 class="section-label mt-75 mb-0">Members</h6></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                                   href="app-user-view.html">
            <div class="d-flex align-items-center">
                <div class="avatar mr-75"><img alt="png" height="32" src="images/portrait/small/avatar-s-8.jpg"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                                   href="app-user-view.html">
            <div class="d-flex align-items-center">
                <div class="avatar mr-75"><img alt="png" height="32" src="images/portrait/small/avatar-s-1.jpg"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                                   href="app-user-view.html">
            <div class="d-flex align-items-center">
                <div class="avatar mr-75"><img alt="png" height="32" src="images/portrait/small/avatar-s-14.jpg"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing
                        Manager</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                                   href="app-user-view.html">
            <div class="d-flex align-items-center">
                <div class="avatar mr-75"><img alt="png" height="32" src="images/portrait/small/avatar-s-6.jpg"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
        </a></li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between"><a
            class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="mr-75" data-feather="alert-circle"></span><span>No results found.</span>
            </div>
        </a></li>
</ul>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="home-page.html">
                    <span class="brand-logo"></span>
                    <h2 class="brand-text">Fleet EG</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                       data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" data-menu="menu-navigation" id="main-menu-navigation">
            <li class=" navigation-header">
                <span data-i18n="Apps &amp; Pages">صفحات الادمن</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="home-page.html">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="HomePage">الرئيسية</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="users.html">
                    <i data-feather="users"></i>
                    <span class="menu-title text-truncate" data-i18n="User">المستخدمين</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="products-admin.html">
                    <i data-feather="grid"></i>
                    <span class="menu-title text-truncate" data-i18n="Products">المنتجات</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="products-categories.html">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="product-categories">فثات المنتجات</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="products-specs.html">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="View">خصائص فئات المنتجات</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="products-admin.html">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="View"> المنتجات</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="orders.html">
                    <i data-feather="shopping-cart"></i>
                    <span class="menu-title text-truncate" data-i18n="Orders">الطلبات</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="bannars.html">
                    <i data-feather="image"></i>
                    <span class="menu-title text-truncate" data-i18n="admins">البانر الاعلامى</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="money-requests-admin.html">
                    <i data-feather="dollar-sign"></i>
                    <span class="menu-title text-truncate" data-i18n="Orders">طلبات السحب المالى </span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="admins.html">
                    <i data-feather="database"></i>
                    <span class="menu-title text-truncate" data-i18n="admins">المديرين</span>
                </a>
            </li>
            <!-- ///////////////////////////////////////////////// -->
            <li class=" navigation-header">
                <span data-i18n="Apps &amp; Pages">صفحات المستخدم</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item" class="active">
                <a class="d-flex align-items-center" href="home-page.html">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="HomePage">الرئيسية</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="products.html">
                    <i data-feather="grid"></i>
                    <span class="menu-title text-truncate" data-i18n="Products">المنتجات</span>
                    <span class="badge badge-light-warning badge-pill ml-auto mr-1">3</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="products.html">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="AllProducts">كل المنتجات</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="products.html">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="FavouriteProducts">المنتجات المفضله</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="orders.html">
                    <i data-feather="shopping-cart"></i>
                    <span class="menu-title text-truncate" data-i18n="Orders">الطلبات</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="products.html">
                    <i data-feather="dollar-sign"></i>
                    <span class="menu-title text-truncate" data-i18n="Products">المعاملات الماليه</span>
                    <span class="badge badge-light-warning badge-pill ml-auto mr-1">3</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="money-requests.html">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="AllProducts">طلبات التصفيه الماليه</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="payment-methods.html">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="FavouriteProducts">طرق الدفع</span></a>
                    </li>

                    <li>
                        <a class="d-flex align-items-center" href="wallet-history.html">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="FavouriteProducts">تاريخ المحفظه</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="page-account-settings.html">
                    <i data-feather="settings"></i>
                    <span class="menu-item text-truncate" data-i18n="Account Settings">اعدادات الحساب</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Dashboard Ecommerce Starts -->
            <section id="dashboard-ecommerce">
                <div class="row match-height">
                    <!-- Medal Card -->
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="card card-congratulation-medal">
                            <div class="card-body">
                                <p>اهلا 🎉 John! الرصيد المتاح للتصفيه</p>
                                <h3 class="mb-75 mt-2 pt-50">
                                    <a href="javascript:void(0);">$48.9k</a>
                                </h3>
                                <button class="btn btn-primary" type="button" style="color: #fff">
                                    <a href="money-requests.html" style="color: #fff">تقدم بطلب للتصفيه</a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--/ Medal Card -->

                    <!-- Statistics Card -->
                    <div class="col-xl-8 col-md-6 col-12">
                        <div class="card card-statistics">
                            <div class="card-header">
                                <h4 class="card-title">الارقام الاحصائيه الخاصه بك</h4>
                                <div class="d-flex align-items-center">
                                    <p class="card-text font-small-2 mr-25 mb-0">يتم تجديد الارقام تلقائيا</p>
                                </div>
                            </div>
                            <div class="card-body statistics-body">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="media">
                                            <div class="avatar bg-light-primary mr-2">
                                                <div class="avatar-content">
                                                    <i class="avatar-icon" data-feather="trending-up"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">230k</h4>
                                                <p class="card-text font-small-3 mb-0">عدد الطلبات التى تم تسليمها</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="media">
                                            <div class="avatar bg-light-info mr-2">
                                                <div class="avatar-content">
                                                    <i class="avatar-icon" data-feather="box"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">8.549k</h4>
                                                <p class="card-text font-small-3 mb-0">عدد الطلبات فى حاله الانتظار</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                        <div class="media">
                                            <div class="avatar bg-light-danger mr-2">
                                                <div class="avatar-content">
                                                    <i class="avatar-icon" data-feather="heart"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">1.423k</h4>
                                                <p class="card-text font-small-3 mb-0">عدد المنتجات المفضله لك</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <div class="media">
                                            <div class="avatar bg-light-success mr-2">
                                                <div class="avatar-content">
                                                    <i class="avatar-icon" data-feather="dollar-sign"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">$9745</h4>
                                                <p class="card-text font-small-3 mb-0">اجمالى العموالات الخاصه بك</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Statistics Card -->
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">البانر الاعلانى</h4>
                        </div>
                        <div class="card-body">
                            <div id="carousel-example-caption" class="carousel slide carousel-fade" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-caption" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-caption" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-caption" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <a href="one-product.html">
                                            <img class="img-fluid" style="width: 100%" src="images/slider/09.jpg" alt="First slide" />
                                            <div class="carousel-caption">
                                                <h3 class="text-white">First Slide Label</h3>
                                                <p class="text-white">
                                                    Donut jujubes I love topping I love sweet. Jujubes I love brownie gummi bears I love donut sweet
                                                    chocolate. Tart chocolate marshmallow.Tart carrot cake muffin.
                                                </p>
                                            </div>

                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="img-fluid" style="width: 100%"src="images/slider/08.jpg" alt="Second slide" />
                                        <div class="carousel-caption">
                                            <a href="one-product.html">
                                                <h3 class="text-white">Second Slide Label</h3>
                                                <p class="text-white">
                                                    Tart macaroon marzipan I love soufflé apple pie wafer. Chocolate bar jelly caramels jujubes
                                                    chocolate cake gummies. Cupcake cake I love cake danish carrot cake.
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="one-product.html">
                                            <img class="img-fluid" style="width: 100%"src="images/slider/10.jpg" alt="Third slide" />
                                            <div class="carousel-caption">
                                                <h3 class="text-white">Third Slide Label</h3>
                                                <p class="text-white">
                                                    Pudding sweet pie gummies. Chocolate bar sweet tiramisu cheesecake chocolate cotton candy pastry
                                                    muffin. Marshmallow cake powder icing.
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carousel-example-caption" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example-caption" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- Dashboard Ecommerce ends -->

        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Customizer-->
<div class="customizer d-none d-md-block"><a class="customizer-toggle d-flex align-items-center justify-content-center"
                                             href="javascript:void(0);"><i class="spinner" data-feather="settings"></i></a>
    <div class="customizer-content">
        <!-- Customizer header -->
        <div class="customizer-header px-2 pt-1 pb-0 position-relative">
            <h4 class="mb-0">Theme Customizer</h4>
            <p class="m-0">Customize & Preview in Real Time</p>

            <a class="customizer-close" href="javascript:void(0);"><i data-feather="x"></i></a>
        </div>

        <hr/>

        <!-- Styling & Text Direction -->
        <div class="customizer-styling-direction px-2">
            <p class="font-weight-bold">Skin</p>
            <div class="d-flex">
                <div class="custom-control custom-radio mr-1">
                    <input
                        checked
                        class="custom-control-input layout-name"
                        data-layout=""
                        id="skinlight"
                        name="skinradio"
                        type="radio"
                    />
                    <label class="custom-control-label" for="skinlight">Light</label>
                </div>
                <div class="custom-control custom-radio mr-1">
                    <input
                        class="custom-control-input layout-name"
                        data-layout="bordered-layout"
                        id="skinbordered"
                        name="skinradio"
                        type="radio"
                    />
                    <label class="custom-control-label" for="skinbordered">Bordered</label>
                </div>
                <div class="custom-control custom-radio mr-1">
                    <input
                        class="custom-control-input layout-name"
                        data-layout="dark-layout"
                        id="skindark"
                        name="skinradio"
                        type="radio"
                    />
                    <label class="custom-control-label" for="skindark">Dark</label>
                </div>
                <div class="custom-control custom-radio">
                    <input
                        class="custom-control-input layout-name"
                        data-layout="semi-dark-layout"
                        id="skinsemidark"
                        name="skinradio"
                        type="radio"
                    />
                    <label class="custom-control-label" for="skinsemidark">Semi Dark</label>
                </div>
            </div>
        </div>

        <hr/>

        <!-- Menu -->
        <div class="customizer-menu px-2">
            <div class="d-flex" id="customizer-menu-collapsible">
                <p class="font-weight-bold mr-auto m-0">Menu Collapsed</p>
                <div class="custom-control custom-control-primary custom-switch">
                    <input class="custom-control-input" id="collapse-sidebar-switch" type="checkbox"/>
                    <label class="custom-control-label" for="collapse-sidebar-switch"></label>
                </div>
            </div>
        </div>
        <hr/>

        <!-- Layout Width -->
        <div class="customizer-footer px-2">
            <p class="font-weight-bold">Layout Width</p>
            <div class="d-flex">
                <div class="custom-control custom-radio mr-1">
                    <input checked class="custom-control-input" id="layout-width-full" name="layoutWidth" type="radio"/>
                    <label class="custom-control-label" for="layout-width-full">Full Width</label>
                </div>
                <div class="custom-control custom-radio mr-1">
                    <input class="custom-control-input" id="layout-width-boxed" name="layoutWidth" type="radio"/>
                    <label class="custom-control-label" for="layout-width-boxed">Boxed</label>
                </div>
            </div>
        </div>
        <hr/>

        <!-- Navbar -->
        <div class="customizer-navbar px-2">
            <div id="customizer-navbar-colors">
                <p class="font-weight-bold">Navbar Color</p>
                <ul class="list-inline unstyled-list">
                    <li class="color-box bg-white border selected" data-navbar-default=""></li>
                    <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
                    <li class="color-box bg-secondary" data-navbar-color="bg-secondary"></li>
                    <li class="color-box bg-success" data-navbar-color="bg-success"></li>
                    <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
                    <li class="color-box bg-info" data-navbar-color="bg-info"></li>
                    <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
                    <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
                </ul>
            </div>

            <p class="navbar-type-text font-weight-bold">Navbar Type</p>
            <div class="d-flex">
                <div class="custom-control custom-radio mr-1">
                    <input checked class="custom-control-input" id="nav-type-floating" name="navType" type="radio"/>
                    <label class="custom-control-label" for="nav-type-floating">Floating</label>
                </div>
                <div class="custom-control custom-radio mr-1">
                    <input class="custom-control-input" id="nav-type-sticky" name="navType" type="radio"/>
                    <label class="custom-control-label" for="nav-type-sticky">Sticky</label>
                </div>
                <div class="custom-control custom-radio mr-1">
                    <input class="custom-control-input" id="nav-type-static" name="navType" type="radio"/>
                    <label class="custom-control-label" for="nav-type-static">Static</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" id="nav-type-hidden" name="navType" type="radio"/>
                    <label class="custom-control-label" for="nav-type-hidden">Hidden</label>
                </div>
            </div>
        </div>
        <hr/>

        <!-- Footer -->
        <div class="customizer-footer px-2">
            <p class="font-weight-bold">Footer Type</p>
            <div class="d-flex">
                <div class="custom-control custom-radio mr-1">
                    <input class="custom-control-input" id="footer-type-sticky" name="footerType" type="radio"/>
                    <label class="custom-control-label" for="footer-type-sticky">Sticky</label>
                </div>
                <div class="custom-control custom-radio mr-1">
                    <input checked class="custom-control-input" id="footer-type-static" name="footerType" type="radio"/>
                    <label class="custom-control-label" for="footer-type-static">Static</label>
                </div>
                <div class="custom-control custom-radio mr-1">
                    <input class="custom-control-input" id="footer-type-hidden" name="footerType" type="radio"/>
                    <label class="custom-control-label" for="footer-type-hidden">Hidden</label>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End: Customizer-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT  &copy; 2020
      <span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span
            class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="js/extensions/toastr.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="js/core/app-menu.min.js"></script>
<script src="js/core/app.min.js"></script>
<script src="js/scripts/customizer.min.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<!-- END: Page JS-->
<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({width: 14, height: 14});
        }
    })
</script>
</body>
<!-- END: Body-->
</html>
