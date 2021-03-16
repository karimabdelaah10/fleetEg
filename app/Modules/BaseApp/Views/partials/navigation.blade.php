
<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{route('dashboard')}}">
                    <span class="brand-logo"></span>
                    <h2 class="brand-text">{{ appName() }}</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
{{--                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">--}}
{{--                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>--}}
{{--                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"--}}
{{--                       data-ticon="disc"></i>--}}
{{--                </a>--}}
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" data-menu="menu-navigation" id="main-menu-navigation">
            @if(is_admin())
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{route('dashboard')}}">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="HomePage">{{trans('navigation.home')}}</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/users">
                    <i data-feather="users"></i>
                    <span class="menu-title text-truncate" data-i18n="User">{{trans('navigation.users')}}</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/products">
                    <i data-feather="grid"></i>
                    <span class="menu-title text-truncate" data-i18n="Products">{{trans('navigation.products')}}</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="/categories">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="product-categories">{{trans('navigation.products categories')}}</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="/specs">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="View">{{trans('navigation.products specs')}}</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="/specvalues">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="View">{{trans('navigation.products specs values')}}</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="/product">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="View">{{trans('navigation.products')}}</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/orders">
                    <i data-feather="shopping-cart"></i>
                    <span class="menu-title text-truncate" data-i18n="Orders">{{trans('navigation.orders')}}</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/slider">
                    <i data-feather="image"></i>
                    <span class="menu-title text-truncate" data-i18n="admins">{{trans('navigation.sliders')}}</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/money-request">
                    <i data-feather="dollar-sign"></i>
                    <span class="menu-title text-truncate" data-i18n="Orders">{{trans('navigation.money requests')}}</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/governorates">
                    <i data-feather="map"></i>
                    <span class="menu-title text-truncate" data-i18n="Orders">{{trans('navigation.governorates')}}</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/admins">
                    <i data-feather="database"></i>
                    <span class="menu-title text-truncate" data-i18n="admins">{{trans('navigation.admins')}}</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/configs/edit">
                    <i data-feather="settings"></i>
                    <span class="menu-title text-truncate" data-i18n="admins">{{trans('navigation.configs')}}</span>
                </a>
            </li>
            @elseif(is_user())
            <!-- ///////////////////////////////////////////////// -->
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="HomePage">{{trans('navigation.home')}}</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/product/all">
                    <i data-feather="grid"></i>
                    <span class="menu-title text-truncate" data-i18n="Products">{{trans('navigation.products')}}</span>
                    <span class="badge badge-light-warning badge-pill ml-auto mr-1">3</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="/product/all">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="AllProducts">{{trans('navigation.all products')}}</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="products.html">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="FavouriteProducts">{{trans('navigation.favourite products')}}</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="orders.html">
                    <i data-feather="shopping-cart"></i>
                    <span class="menu-title text-truncate" data-i18n="Orders">{{trans('navigation.orders')}}</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="products.html">
                    <i data-feather="dollar-sign"></i>
                    <span class="menu-title text-truncate" data-i18n="Products">{{trans('navigation.financial processes')}}</span>
                    <span class="badge badge-light-warning badge-pill ml-auto mr-1">3</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="/customer-money-request/">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="AllProducts">{{trans('navigation.money requests')}}</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="payment-methods.html">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="FavouriteProducts">{{trans('navigations.payment methods')}}</span></a>
                    </li>

                    <li>
                        <a class="d-flex align-items-center" href="wallet-history.html">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="FavouriteProducts">{{trans('navigation.wallet history')}}</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/profile/edit">
                    <i data-feather="settings"></i>
                    <span class="menu-item text-truncate" data-i18n="Account Settings">{{trans('navigation.account settings')}}</span>
                </a>
            </li>
            @endif

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
