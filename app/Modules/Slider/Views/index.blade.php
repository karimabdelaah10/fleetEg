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
                        <a href="{{$module_url}}/create" class="add-new btn btn-primary mt-50">{{trans('slider.add bannar')}}</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-4">
                            <thead>
                            <tr>
                                <th >#</th>
                                <th >{{trans('slider.description')}}</th>
                                <th >{{trans('slider.link')}}</th>
                                <th >{{trans('slider.bannar')}}</th>
                                <th >{{trans('app.status')}}</th>
                                <th >{{trans('app.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($rows))
                                @foreach($rows as $element)
                                    <tr>
                                        <td>{{$element->id}}</td>
                                        <td>
                                            @if(!empty($element->description))
                                            <p
                                                class=""
                                                data-toggle="popover"
                                                data-content="{{$element->description}}"
                                                data-trigger="hover"
                                                data-original-title="{{trans('slider.description popover title')}}"
                                            >
                                                {{splitString($element->description , 0 , 20)}}..
                                            </p>
                                            @endif
                                            </td>
                                        <td>
                                            <a href="{{$element->link}}">{{$element->link}}</a>
                                            </td>
                                        <td>
                                            <div class="avatar-group">
                                                    <img
                                                        src="{{$element->image}}"
                                                        alt="Avatar"
                                                        height="50"
                                                        width="120"
                                                    />
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-pill {{$element->is_active ? 'badge-light-success':'badge-light-danger'}} mr-1"> {{$element->is_active ? trans('app.active'):trans('app.inactive')}} </span>
                                        </td>
                                        <td>
                                            @include('BaseApp::partials.actions' ,['actions'=>['edit' ,'delete'] , $element])
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        {{ $rows->links('vendor.pagination.custom' ,['module_url'=>$module_url]) }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Tables end -->
    </div>
@endsection
@push('js')
    <script src="/js/pages/components-popovers.min.js"></script>

    <script src="/js/pages/jquery.bootpag.min.js"></script>
    <script src="/js/pages/jquery.twbsPagination.min.js"></script>

    <script src="/js/pages/components-pagination.js"></script>

@endpush
