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
                        <a href="{{$module_url}}/create" class="add-new btn btn-primary mt-50">{{trans('paymentmethods.add method')}}</a>

                        </div>

                    <div class="table-responsive">
                        <table class="table mb-4">
                            <thead>
                            <tr>
                                <th >#</th>
                                <th >{{trans('paymentmethods.method')}}</th>
                                <th >{{trans('paymentmethods.method info')}}</th>
                                <th >{{trans('paymentmethods.default method')}}</th>
{{--                                <th >{{trans('paymentmethods.requested_amount')}}</th>--}}
                                <th >{{trans('app.actions')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($rows))
                                @foreach($rows as $element)
                                    <tr>
                                        <td>#</td>
                                        <td> {{@trans('paymentmethods.'.$element->type)}}</td>
                                        <td>
                                            @if(!empty($element->type))
                                                {!! getMethodInfo($element) !!}
                                            @endif

                                        </td>
                                        <td>
                                        <default-payment-method :row = {{ $element }}></default-payment-method>
                                        </td>
                                        <td>
                                            @include('BaseApp::partials.actions' ,['actions'=>['delete'] , $element])
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
    </div>
@endsection
@push('js')
    <script src="/js/pages/components-popovers.min.js"></script>

    <script src="/js/pages/jquery.bootpag.min.js"></script>
    <script src="/js/pages/jquery.twbsPagination.min.js"></script>

    <script src="/js/pages/components-pagination.js"></script>

@endpush
