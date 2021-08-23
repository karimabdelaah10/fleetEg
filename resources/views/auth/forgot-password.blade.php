@extends('BaseApp::layouts.auth')
@push('css')
    <link rel="stylesheet" href="css/auth.css">
@endpush
@section('page-title')
    نسيت الرقم السرى ؟
@endsection
@section('page-title')
    <h6 class="slim-pagetitle">
        نسيت الرقم السرى ؟
    </h6>
@endsection
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper" id="app">
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                        <a class="brand-logo" href="{{route('dashboard')}}">
                            <h2 class="brand-text text-primary ml-1">{{ appName() }}</h2></a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                                <img class="img-fluid" src="/images/forgot-password-v2.png"
                                     alt="Forgot password V2"/>
                            </div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Forgot password-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title font-weight-bold mb-1">نسيت الرقم السرى؟ 🔒</h2>
                                <p class="card-text mb-2">أدخل رقم الهاتف الخاص بك وسنرسل إليك  كلمة المرور الجديدة الخاصة بك</p>
                                <form class="auth-forgot-password-form mt-2" action="{{route('password.email')}}" method="POST">
                                   @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="forgot-password-email">رقم الهاتف الخاص  بك</label>
                                        <input class="form-control"
                                               id="forgot-password-email"
                                               type="text"
                                               name="mobile_number"
                                               placeholder="010xxxxxxxx"
                                               aria-describedby="forgot-password-email"
                                               autofocus=""
                                               tabindex="1"/>
                                        @if($errors->has('mobile_number'))
                                            @foreach ($errors->get('mobile_number') as $message)
                                                <span class="text-danger">
                                                    {{$message}}
                                                </span>
                                            @endforeach

                                        @endif
                                    </div>
                                    <button class="btn btn-primary btn-block" tabindex="2">أرسل كلمة المرور</button>
                                </form>
                                <p class="text-center mt-2"><a href="{{route('login')}}">
                                        <i data-feather="chevron-left"></i> العودة إلى تسجيل الدخول</a></p>
{{--                                <button type="button" class="btn btn-outline-success" id="type-success">Success</button>--}}

                            </div>
                        </div>
                        <!-- /Forgot password-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@push('js')
    <script>
    </script>
@endpush
