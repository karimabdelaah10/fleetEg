@extends('BaseApp::layouts.products')
@section('page-title')
    {{ @$page_title }}
@endsection
@section('content')
    <one-products-component :row="{{$row}}"></one-products-component>
@endsection
@push('js')
<script src="/js/pages/swiper.min.js"></script>
<script src="/js/pages/app-ecommerce-details.min.js"></script>
<script src="/js/pages/form-number-input.min.js"></script>
@endpush()
@push('css')
<link rel="stylesheet" type="text/css" href="/css/pages/swiper.min.css">
<link rel="stylesheet" type="text/css" href="/css/pages/app-ecommerce-details.min.css">
<link rel="stylesheet" type="text/css" href="/css/pages/form-number-input.min.css">
@endpush()
