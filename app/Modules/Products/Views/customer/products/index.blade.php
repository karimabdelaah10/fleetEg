@extends('BaseApp::layouts.products')
@section('page-title')
    {{ @$page_title }}
@endsection
@section('content')
    <products-component :row="{{$row}}"></products-component>
@endsection
