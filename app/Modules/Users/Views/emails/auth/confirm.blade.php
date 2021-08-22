@extends('BaseApp::layouts.mail')
@section('content')
    <h5 class="card-title">  Welcome {{$name}} On {{env('APP_NAME')}}  👋</h5>
    <p class="card-text"> Your New Password Is
            <span class="badge badge-light code">
                {{$password}}
            </span>
        </p>
@endsection
