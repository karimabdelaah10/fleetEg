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
                        <a href="{{$module_url}}/create-request" class="add-new btn btn-primary mt-50">{{trans('moneyrequest.add request')}}</a>

                        </div>

                    <div class="table-responsive">
                        <table class="table mb-4">
                            <thead>
                            <tr>
                                <th >#</th>
                                <th >{{trans('moneyrequest.available_balance')}}</th>
                                <th >{{trans('moneyrequest.requested_amount')}}</th>
                                <th >{{trans('app.status')}}</th>
                                <th >{{trans('app.created_at')}}</th>
                                <th >{{trans('app.updated_at')}}</th>
                                <th >{{trans('app.actions')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($rows))
                                @foreach($rows as $element)
                                    <tr>
                                        <td>{{@$element->id}}</td>
                                        <td> {{@$element->available_balance}}</td>
                                        <td> {{@$element->requested_amount}}</td>
                                        <td> {!! getRequestStatus($element->status) !!} </td>
                                        <td> {{\Carbon\Carbon::parse($element->created_at)->format('Y-m-d')}}</td>
                                        <td> {{\Carbon\Carbon::parse($element->updated_at)->format('Y-m-d')}}</td>
                                        <td>
                                            @if($element->status == \App\Modules\BaseApp\Enums\GeneralEnum::PENDING)
                                                @include('BaseApp::partials.actions' ,['actions'=>['edit','delete'] , $element])
                                            @else
                                                {!! getRequestStatus($element->status) !!}
                                            @endif
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
