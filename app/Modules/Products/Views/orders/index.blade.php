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

                        <div class="dropdown chart-dropdown">
                            <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{$module_url}}/export?@forelse(request()->query() as $key=>$val){{$key}}={{$val}}&@empty @endforelse">
                                    {{trans('orders.export orders')}}
                                </a>
                                <a class="dropdown-item" href="{{$module_url}}/import">
                                    {{trans('orders.import orders')}}
                                </a>

                            </div>
                        </div>
                 </div>
                    <div class="table-responsive">
                        <div class="col-12">
                            <form method="get">
{{--                                <div class="input-group input-group-merge">--}}
{{--                                    <input--}}
{{--                                        type="text"--}}
{{--                                        name="search_key"--}}
{{--                                        class="form-control search-product"--}}
{{--                                        id="shop-search"--}}
{{--                                        value="{{request()->search_key}}"--}}
{{--                                        placeholder="{{trans('app.search_in_orders')}}"--}}
{{--                                        aria-describedby="shop-search"--}}
{{--                                    />--}}
{{--                                    <div class="input-group-append">--}}
{{--                                <span class="input-group-text">--}}
{{--                                    <i data-feather="search"--}}
{{--                                       class="text-muted">--}}
{{--                                    </i>--}}
{{--                                </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="row mt-1">
                                    <div class="mb-2 col-2">
                                        <select class="form-control" name="status" id="add-type">
                                            <option @if(!request()->status) selected @endif disabled>{{trans('orders.status')}}</option>
                                            @forelse(\App\Modules\Products\Enums\OrdersEnum::ordersStatusesForSelector() as $key =>$val)
                                                <option @if(request()->status &&  request()->status == $key) selected @endif value="{{$key}}">{{$val}} </option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <label>{{trans('app.from')}}</label>
                                    <div class="mb-2 col-3">
                                        <input
                                            type="date"
                                            name="from"
                                            class="form-control search-product"
                                            id="shop-search"
                                            value="{{request()->from}}"
                                        />

                                    </div>
                                    <label>{{trans('app.to')}}</label>
                                    <div class="mb-2 col-3">
                                        <input
                                            type="date"
                                            name="to"
                                            class="form-control search-product"
                                            id="shop-search"
                                            value="{{request()->to}}"
                                        />
                                    </div>
                                    <div class="mb-2 col-3">
                                        <button type="submit" class="btn btn-primary data-submit">{{trans('app.filter')}}</button>
                                        <a href="{{$module_url}}" type="reset" class="btn btn-outline-secondary">{{trans('app.cancel')}}</a>
                                    </div>

                                    </div>
                            </form>
                        </div>

                        <table class="table mb-4">
                            <thead>
                            <tr>
                                <th>{{trans('orders.serial')}}</th>
                                <th>{{trans('orders.user_name')}}</th>
                                <th>{{trans('orders.price')}}</th>
                                <th>{{trans('orders.date')}}</th>
                                <th>{{trans('orders.status')}}</th>
                                <th>{{trans('app.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($rows))
                                @foreach($rows as $element)
                                    <tr>
                                        <td>{{@$element->id}}</td>
                                        <td>{{@$element->user->name}}</td>
                                        <td>{{@$element->total_price}}</td>
                                        <td>{{@$element->created_at ? \Carbon\Carbon::parse($element->created_at)->format('Y-m-d') : '' }}</td>
                                        <td>
                                            {!! get_status_for_blade($element->status) !!}
                                        </td>
                                        <td>
                                            @if(in_array($element->status , \App\Modules\Products\Enums\OrdersEnum::ordersFinalsStatuses()))
                                                {!! get_status_for_blade($element->status) !!}
                                            @else
                                                @include('BaseApp::partials.actions' ,['actions'=>['view','edit'] , $element])
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
        <!-- Basic Tables end -->
    </div>
@endsection
@push('js')

    <script src="/js/pages/jquery.bootpag.min.js"></script>
    <script src="/js/pages/jquery.twbsPagination.min.js"></script>

    <script src="/js/pages/components-pagination.js"></script>

@endpush
