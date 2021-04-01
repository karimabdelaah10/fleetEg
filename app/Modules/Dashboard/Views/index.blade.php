@extends('BaseApp::layouts.master')
@section('page-title')
الصفحه الرئيسيه
@endsection
@section('content')
<div class="section-wrapper">
    <div class="row match-height">
        <!-- Medal Card -->
        <div class="col-xl-4 col-md-6 col-12">
            <div class="card card-congratulation-medal">
                <div class="card-body">
                    <p>{{trans('app.welcome')}}  {{auth()->user()->name}}  🎉 !! </p>
                    <h3 class="mb-75 mt-2 pt-50">
                        {{trans('app.list orders')}}
                    </h3>
                    <button class="btn btn-primary" type="button" style="color: #fff">
                        <a href="/orders" style="color: #fff">{{trans('navigation.orders')}}</a>
                    </button>
                </div>
            </div>
        </div>
        <!--/ Medal Card -->

        <!-- Statistics Card -->
        <div class="col-xl-8 col-md-6 col-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <h4 class="card-title">{{trans('user.admin_numbers')}}</h4>
                </div>
                <div class="card-body statistics-body">
                    <div class="row">
                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="media">
                                <div class="avatar bg-light-primary mr-2">
                                    <div class="avatar-content">
                                        <i class="avatar-icon" data-feather="shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0">{{$numbers->delivered_orders}}</h4>
                                    <p class="card-text font-small-3 mb-0">{{trans('orders.delivered_orders_count')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="media">
                                <div class="avatar bg-light-info mr-2">
                                    <div class="avatar-content">
                                        <i class="avatar-icon" data-feather="box"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0">{{$numbers->under_review_orders}}</h4>
                                    <p class="card-text font-small-3 mb-0">{{trans('orders.under_review_orders')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-12">
                            <div class="media">
                                <div class="avatar bg-light-success mr-2">
                                    <div class="avatar-content">
                                        <i class="avatar-icon" data-feather="dollar-sign"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0">{{$numbers->total_commission}}</h4>
                                    <p class="card-text font-small-3 mb-0">{{trans('app.total_user_commission')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Statistics Card -->
    </div>
    @if(count($orders))
    <div class="row match-height">
        <div class="col-lg-12 col-12">
            <div class="card card-company-table">
                <div class="card-header">
                    <h4 class="card-title">{{trans('user.last 10 orders')}}</h4>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
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
                            @forelse($orders as $element)
                                <tr>
                                    <td>{{@$element->id}}</td>
                                    <td>{{@$element->user->name}}</td>
                                    <td>{{@$element->total_price}}</td>
                                    <td>{{@$element->created_at ? \Carbon\Carbon::parse($element->created_at)->format('Y-m-d') : '' }}</td>
                                    <td>
                                        {!! get_status_for_blade($element->status) !!}

                                    </td>
                                    <td>
                                        <div class="dropdown chart-dropdown">
                                            <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="/orders/view/{{@$element->id}}">{{trans('user.list one order')}}</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endif
    @if(count($money_requests))
    <div class="row match-height">
        <!-- Company Table Card -->
        <div class="col-lg-12 col-12">
            <div class="card card-company-table">
                <div class="card-header">
                    <h4 class="card-title">{{trans('user.last 10 money requests')}}</h4>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th >#</th>
                                <th >{{trans('moneyrequest.user')}}</th>
                                <th >{{trans('moneyrequest.available_balance')}}</th>
                                <th >{{trans('moneyrequest.requested_amount')}}</th>
                                <th >{{trans('app.status')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($money_requests as $element)
                                <tr>
                                    <td>{{$element->id}}</td>
                                    <td> {{@$element->user->name}}</td>
                                    <td> {{$element->available_balance}}</td>
                                    <td> {{$element->requested_amount}}</td>
                                    <td> {!! getRequestStatus($element->status) !!} </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Company Table Card -->
    </div>
    @endif

</div>
@endsection
@push('js')
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
        $('#flash-overlay-modal').modal();
    </script>
@endpush
