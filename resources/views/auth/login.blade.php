@extends('BaseApp::layouts.auth')
@push('css')
    <link rel="stylesheet" href="css/auth.css">
@endpush
@section('page-title')
        تسجيل الدخول
@endsection
@section('title')
    <h6 class="slim-pagetitle">
        تسجيل الدخول
    </h6>
@endsection
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper" id="app">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                        <a class="brand-logo" href="{{url('/')}}">
                            <h2 class="brand-text text-primary ml-1">Fleet EG</h2></a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/images/pages/login-v2.svg" alt="Login V2"/></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title font-weight-bold mb-1">اهلا و مرحباك بك فى Fleet EG! 👋</h2>
                                <p class="card-text mb-2">الرجاء تسجيل الدخول للحساب الخاص بك</p>
                                <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="login-email">رقم الهاتف</label>
                                        <input class="form-control"
                                               id="login-email"
                                               type="text"
                                               name="mobile_number"
                                               value="{{old('mobile_number')}}"
                                               required
                                               placeholder="010xxxxxxxx"
                                               aria-describedby="mobile_number"
                                               autofocus=""
                                               tabindex="1"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="login-password">الرقم السرى</label>
                                            <a href="{{route('password.request')}}">
                                                <small>نسيت الرقم السرى ؟</small>
                                            </a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge"
                                                   id="login-password"
                                                   type="password"
                                                   name="password"
                                                   placeholder="············"
                                                   aria-describedby="password"
                                                   tabindex="2"
                                            />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer">
                                                    <i data-feather="eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('mobile_number') || $errors->has('password'))
                                    <div class="form-group">
                                                <span style="color: red"> يوجد خطأ , فى رقم الهاتف او الرقم السرى</span>
                                    </div>
                                    @endif
                                    <button class="btn btn-primary btn-block" tabindex="4">
                                         تسجيل الدخول
                                    </button>
                                </form>
                                <p class="text-center mt-2">
                                    <span>عضو جديد ؟</span>
                                    <a href="{{route('register')}}">
                                        <span>&nbsp;انشاء حساب جديد</span>
                                    </a>
                                </p>

                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
