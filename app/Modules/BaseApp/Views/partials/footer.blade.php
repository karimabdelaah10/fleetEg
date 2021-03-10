<!-- BEGIN: Customizer-->
<div class="customizer d-none d-md-block">
    <a class="customizer-toggle d-flex align-items-center justify-content-center"
       href="javascript:void(0);">
        <i class="spinner" data-feather="settings"></i>
    </a>
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
<footer class="footer footer-static footer-light" id="footer">
    <footer-component></footer-component>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->
