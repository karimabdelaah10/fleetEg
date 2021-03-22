@extends('BaseApp::layouts.orders')
@section('page-title')
    {{ @$page_title }}
@endsection
@section('content')
<div class="content-body">
    <div class="bs-stepper checkout-tab-steps">
        <check-out-component :row="{{ $row }}"></check-out-component>
    </div>
</div>
@endsection
