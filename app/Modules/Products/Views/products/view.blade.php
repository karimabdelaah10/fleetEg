@extends('BaseApp::layouts.master')
@section('page-title')
    {{ @$page_title }}
@endsection
@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">{{trans('app.wrong action')}}</h4>
            {!! implode('' ,$errors->all('<div class="alert-body">:message</div>')) !!}
        </div>
    @endif
    <div class="content-body">
        <!-- Basic Tables start -->
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            {{ @$page_description }}
                        </h4>
                        <a href="{{$module_url}}/edit/{{$row->id}}" class="add-new btn btn-primary mt-50">{{trans('specs.edit spec')}}</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-4">
                            <tr>
                                <td>{{trans('specs.title')}}</td>
                                <td>
                                    {{$row->title}}
                                </td>
                            </tr>
                            <tr>
                                <td>{{trans('app.status')}}</td>
                                <td>
                                    <span class="badge badge-pill {{$row->is_active ? 'badge-light-success':'badge-light-danger'}} mr-1"> {{$row->is_active ? trans('app.active'):trans('app.inactive')}} </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Tables end -->
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            {{ trans('specs.specs values list') }}
                        </h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-4">
                            <thead>
                            <tr>
                                <th >#</th>
                                <th >{{trans('specvalues.title')}}</th>
                                <th >{{trans('app.status')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($row->specsvalues))
                                @foreach($row->specsvalues as $element)
                                    <tr>
                                        <td>{{$element->id}}</td>
                                        <td>{{$element->title}}</td>
                                        <td>
                                            <span class="badge badge-pill {{$element->is_active ? 'badge-light-success':'badge-light-danger'}} mr-1"> {{$element->is_active ? trans('app.active'):trans('app.inactive')}} </span>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
