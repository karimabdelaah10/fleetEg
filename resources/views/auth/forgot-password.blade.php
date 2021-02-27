{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <div class="mb-4 text-sm text-gray-600">--}}
{{--            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}--}}
{{--        </div>--}}

{{--        <!-- Session Status -->--}}
{{--        <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="{{ route('password.email') }}">--}}
{{--            @csrf--}}

{{--            <!-- Email Address -->--}}
{{--            <div>--}}
{{--                <x-label for="email" :value="__('Email')" />--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-button>--}}
{{--                    {{ __('Email Password Reset Link') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}
@extends('BaseApp::layouts.auth')
@push('css')
    <link rel="stylesheet" href="css/auth.css">
@endpush
@section('page-title')
    نسيت الرقم السرى ؟
@endsection
@section('title')
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
                            <h2 class="brand-text text-primary ml-1">Fleet EG</h2></a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                                <img class="img-fluid" src="images/forgot-password-v2.png"
                                     alt="Forgot password V2"/>
                            </div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Forgot password-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title font-weight-bold mb-1">نسيت الرقم السرى؟ 🔒</h2>
                                <p class="card-text mb-2">أدخل رقم الهاتف الخاص بك وسنرسل إليك  كلمة المرور الجديده الخاصه بك</p>
                                <form class="auth-forgot-password-form mt-2" action="{{route('password.email')}}" method="POST">
                                   @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="forgot-password-email">رقم الهاتف الخاص  بك</label>
                                        <input class="form-control" id="forgot-password-email" type="text" name="mobile_number" placeholder="010xxxxxxxx" aria-describedby="forgot-password-email" autofocus="" tabindex="1"/>
                                    </div>
                                    <button class="btn btn-primary btn-block" tabindex="2">أرسل كلمه المرور</button>
                                </form>
                                <p class="text-center mt-2"><a href="{{route('login')}}">
                                        <i data-feather="chevron-left"></i> العودة إلى تسجيل الدخول</a></p>
                                <button type="button" class="btn btn-outline-success" id="type-success">Success</button>

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
