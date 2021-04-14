@extends('BaseApp::layouts.mail')
@section('content')
    <h5 class="card-title">  Welcome {{$name}}  👋</h5>
    <p class="card-text">
            <span class="badge badge-light code">{{$body}}</span>
        </p>
@endsection
