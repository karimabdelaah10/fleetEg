@extends('BaseApp::layouts.products')
@section('page-title')
    {{ @$page_title }}
@endsection
@section('content')
    <fav-products-component :row="{{$row}}"></fav-products-component>
@endsection
