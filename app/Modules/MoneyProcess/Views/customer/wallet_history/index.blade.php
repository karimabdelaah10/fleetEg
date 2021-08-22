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
{{--                        <a href="{{$module_url}}/create" class="add-new btn btn-primary mt-50">{{trans('wallethistory.add method')}}</a>--}}
                        </div>

                    <div class="table-responsive">
                        <table class="table mb-4">
                            <thead>
                            <tr>
                                <th >#</th>
                                <th >{{trans('wallethistory.transaction_type')}}</th>
                                <th >{{trans('wallethistory.transaction_message')}}</th>
                                <th >{{trans('wallethistory.amount')}}</th>
                                <th >{{trans('wallethistory.available_balance_before_transaction')}}</th>
                                <th >{{trans('wallethistory.available_balance_after_transaction')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                                @forelse($rows as $element)
                                    <tr>
                                        <td>#</td>
                                        <td>
                                            {{trans('wallethistory.type_'.$element->transaction_type)}}
                                        </td>
                                        <td>{{trans('wallethistory.message_'.$element->transaction_type)}}</td>
                                        <td> {{$element->amount}}</td>
                                        <td> {{$element->available_balance_before_transaction}}</td>
                                        <td> {{$element->available_balance_after_transaction}}</td>
                                    </tr>
                                    @empty
                                @endforelse
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
