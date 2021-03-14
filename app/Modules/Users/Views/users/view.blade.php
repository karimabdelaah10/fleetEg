@extends('BaseApp::layouts.master')
@section('page-title')
    {{ @$page_title }}
@endsection
@section('content')
    <div class="content-body"><!-- Dashboard Ecommerce Starts -->
        <section id="dashboard-ecommerce">
            <div class="row">
                <!-- User Card starts-->
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="card user-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                    <div class="user-avatar-section">
                                        <div class="d-flex justify-content-start">
                                            <img
                                                class="img-fluid rounded"
                                                src="{{$row->profile_picture}}"
                                                height="104"
                                                width="104"
                                                alt="User avatar"
                                            />
                                            <div class="d-flex flex-column ml-1">
                                                <div class="user-info mb-1">
                                                    <h4 class="mb-0">{{$row->name}}</h4>
                                                    <span class="card-text">{{$row->email}}</span>
                                                </div>
                                                <div class="d-flex flex-wrap">
                                                    <a href="/users/edit/{{$row->id}}" class="btn btn-primary">{{trans('app.edit')}}</a>
                                                    <a href="/users/delete/{{$row->id}}" class="btn btn-outline-danger ml-1">{{trans('app.delete')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="d-flex align-items-center user-total-numbers">
                                        <div class="d-flex align-items-center mr-2">
                                            <div class="color-box bg-light-primary">
                                                <i data-feather="dollar-sign" class="text-primary"></i>
                                            </div>
                                            <div class="ml-1">
                                                <h5 class="mb-0">23.3k</h5>
                                                <small>Monthly Sales</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="color-box bg-light-success">
                                                <i data-feather="trending-up" class="text-success"></i>
                                            </div>
                                            <div class="ml-1">
                                                <h5 class="mb-0">$99.87K</h5>
                                                <small>Annual Profit</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                    <div class="user-info-wrapper">
                                        <div class="d-flex flex-wrap">
                                            <div class="user-info-title" style="width: 11.785rem;">
                                                <i data-feather="user" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">{{trans('user.address')}}</span>
                                            </div>
                                            <p class="card-text mb-0">{{$row->address}}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title" style="width: 11.785rem;">
                                                <i data-feather="check" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">{{trans('app.status')}}</span>
                                            </div>
                                            <p class="card-text mb-0">{{$row->is_active ? trans('app.active') : trans('app.inactive')}}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title" style="width: 11.785rem;">
                                                <i data-feather="star" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">{{trans('user.role')}}</span>
                                            </div>
                                            <p class="card-text mb-0">{{$row->type}}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title" style="width: 11.785rem;">
                                                <i data-feather="dollar-sign" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">{{trans('user.available_balance')}}</span>
                                            </div>
                                            <p class="card-text mb-0">{{$row->available_balance}} {{trans('app.egyptian_pound')}}</p>
                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <div class="user-info-title" style="width: 11.785rem;">
                                                <i data-feather="phone" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">{{trans('user.mobile_number')}}</span>
                                            </div>
                                            <p class="card-text mb-0">{{$row->mobile_number}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /User Card Ends-->

                <!-- Plan Card starts-->
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="card plan-card border-primary">
                        <div class="card-header d-flex justify-content-between align-items-center pt-75 pb-1">
                            <h5 class="mb-0">Current Plan</h5>
                            <span class="badge badge-light-secondary" data-toggle="tooltip" data-placement="top" title="Expiry Date"
                            >July 22, <span class="nextYear"></span>
          </span>
                        </div>
                        <div class="card-body">
                            <div class="badge badge-light-primary">Basic</div>
                            <ul class="list-unstyled my-1">
                                <li>
                                    <span class="align-middle">5 Users</span>
                                </li>
                                <li class="my-25">
                                    <span class="align-middle">10 GB storage</span>
                                </li>
                                <li>
                                    <span class="align-middle">Basic Support</span>
                                </li>
                            </ul>
                            <button class="btn btn-primary text-center btn-block">Upgrade Plan</button>
                        </div>
                    </div>
                </div>
                <!-- /Plan CardEnds -->
            </div>
{{--            <div class="row match-height">--}}
{{--                <!-- Medal Card -->--}}
{{--                <!-- Profile Card -->--}}
{{--                <div class="col-lg-4 col-md-6 col-12">--}}
{{--                    <div class="card card-profile">--}}
{{--                        <img--}}
{{--                            src="/images/banner/banner-12.jpg"--}}
{{--                            class="img-fluid card-img-top"--}}
{{--                            alt="Profile Cover Photo"--}}
{{--                        />--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="profile-image-wrapper">--}}
{{--                                <div class="profile-image">--}}
{{--                                    <div class="avatar">--}}
{{--                                        <img src="{{$row->profile_picture}}"--}}
{{--                                             alt="Profile Picture" />--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <h3>{{$row->name}}</h3>--}}
{{--                            <h6 class="text-muted">{{$row->type}}</h6>--}}
{{--                            <h6 class="text-capitalize">{{$row->email}}</h6>--}}
{{--                            <h6 class="text-capitalize">{{$row->address}}</h6>--}}
{{--                            <div class="badge badge-light-primary profile-badge">{{$row->mobile_number}}</div>--}}
{{--                            <br>--}}
{{--                            <div class="badge badge-primary ">--}}
{{--                                <a href="{{$module_url}}/edit/{{$row->id}}">--}}
{{--                                    {{trans('app.edit')}}--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <hr class="mb-2" />--}}
{{--                            <div class="d-flex justify-content-between align-items-center">--}}
{{--                                <div>--}}
{{--                                    <h6 class="text-muted font-weight-bolder">Followers</h6>--}}
{{--                                    <h3 class="mb-0">10.3k</h3>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <h6 class="text-muted font-weight-bolder">Projects</h6>--}}
{{--                                    <h3 class="mb-0">156</h3>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <h6 class="text-muted font-weight-bolder">Rank</h6>--}}
{{--                                    <h3 class="mb-0">23</h3>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--/ Profile Card -->--}}

{{--                <!--/ Medal Card -->--}}

{{--                <!-- Statistics Card -->--}}
{{--                <div class="col-xl-8 col-md-6 col-12">--}}
{{--                    <div class="card card-statistics">--}}
{{--                        <div class="card-header">--}}
{{--                            <h4 class="card-title">الارقام الاحصائيه الخاصه بك</h4>--}}
{{--                            <div class="d-flex align-items-center">--}}
{{--                                <p class="card-text font-small-2 mr-25 mb-0">يتم تجديد الارقام تلقائيا</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body statistics-body">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">--}}
{{--                                    <div class="media">--}}
{{--                                        <div class="avatar bg-light-primary mr-2">--}}
{{--                                            <div class="avatar-content">--}}
{{--                                                <i class="avatar-icon" data-feather="trending-up"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body my-auto">--}}
{{--                                            <h4 class="font-weight-bolder mb-0">230k</h4>--}}
{{--                                            <p class="card-text font-small-3 mb-0">عدد الطلبات التى تم تسليمها</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">--}}
{{--                                    <div class="media">--}}
{{--                                        <div class="avatar bg-light-info mr-2">--}}
{{--                                            <div class="avatar-content">--}}
{{--                                                <i class="avatar-icon" data-feather="box"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body my-auto">--}}
{{--                                            <h4 class="font-weight-bolder mb-0">8.549k</h4>--}}
{{--                                            <p class="card-text font-small-3 mb-0">عدد الطلبات فى حاله الانتظار</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">--}}
{{--                                    <div class="media">--}}
{{--                                        <div class="avatar bg-light-danger mr-2">--}}
{{--                                            <div class="avatar-content">--}}
{{--                                                <i class="avatar-icon" data-feather="heart"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body my-auto">--}}
{{--                                            <h4 class="font-weight-bolder mb-0">1.423k</h4>--}}
{{--                                            <p class="card-text font-small-3 mb-0">عدد المنتجات المفضله لك</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-xl-3 col-sm-6 col-12">--}}
{{--                                    <div class="media">--}}
{{--                                        <div class="avatar bg-light-success mr-2">--}}
{{--                                            <div class="avatar-content">--}}
{{--                                                <i class="avatar-icon" data-feather="dollar-sign"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body my-auto">--}}
{{--                                            <h4 class="font-weight-bolder mb-0">$9745</h4>--}}
{{--                                            <p class="card-text font-small-3 mb-0">اجمالى العموالات الخاصه بك</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--/ Statistics Card -->--}}
{{--            </div>--}}
            <div class="row match-height">
                <div class="col-lg-12 col-12">
                    <div class="card card-company-table">
                        <div class="card-header">
                            <h4 class="card-title">{{trans('user.last 10 orders')}}</h4>
                            <div class="dropdown chart-dropdown">
                                <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/users/orders/{{$row->id}}">{{trans('user.all orders')}}</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>{{trans('orders.serial')}}</th>
                                        <th>{{trans('orders.price')}}</th>
                                        <th>{{trans('orders.date')}}</th>
                                        <th>{{trans('orders.status')}}</th>
                                        <th>{{trans('app.actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($row->orders->take(10) as $element)
                                        <tr>
                                            <td>{{@$element->id}}</td>
                                            <td>{{@$element->total_price}}</td>
                                            <td>{{@$element->created_at ? \Carbon\Carbon::parse($element->created_at)->format('Y-m-d') : '' }}</td>
                                            <td>
                                                {!! get_status_for_blade($element->status) !!}

                                            </td>
                                            <td>
                                                <div class="dropdown chart-dropdown">
                                                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="/users/order/{{@$element->id}}">{{trans('user.list one order')}}</a>
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
            <div class="row match-height">
                <!-- Company Table Card -->
                <div class="col-lg-8 col-12">
                    <div class="card card-company-table">
                        <div class="card-header">
                            <h4 class="card-title">{{trans('user.last 10 money requests')}}</h4>
                            <div class="dropdown chart-dropdown">
                                <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/users/money-requests/{{$row->id}}">{{trans('user.all money requests')}}</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th >#</th>
                                        <th >{{trans('moneyrequest.available_balance')}}</th>
                                        <th >{{trans('moneyrequest.requested_amount')}}</th>
                                        <th >{{trans('app.status')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--                                    @if(!empty($row->moneyRequests))--}}
                                    @forelse($row->moneyRequests->take(10) as $element)
                                        <tr>
                                            <td>{{$element->id}}</td>
                                            <td> {{$element->available_balance}}</td>
                                            <td> {{$element->requested_amount}}</td>
                                            <td> {!! getRequestStatus($element->status) !!} </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                    {{--                                    @endif--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Company Table Card -->
                <!-- Transaction Card -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card card-transaction">
                        <div class="card-header">
                            <h4 class="card-title">Transactions</h4>
                            <div class="dropdown chart-dropdown">
                                <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="transaction-item">
                                <div class="media">
                                    <div class="avatar bg-light-primary rounded">
                                        <div class="avatar-content">
                                            <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="transaction-title">Wallet</h6>
                                        <small>Starbucks</small>
                                    </div>
                                </div>
                                <div class="font-weight-bolder text-danger">- $74</div>
                            </div>
                            <div class="transaction-item">
                                <div class="media">
                                    <div class="avatar bg-light-success rounded">
                                        <div class="avatar-content">
                                            <i data-feather="check" class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="transaction-title">Bank Transfer</h6>
                                        <small>Add Money</small>
                                    </div>
                                </div>
                                <div class="font-weight-bolder text-success">+ $480</div>
                            </div>
                            <div class="transaction-item">
                                <div class="media">
                                    <div class="avatar bg-light-danger rounded">
                                        <div class="avatar-content">
                                            <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="transaction-title">Paypal</h6>
                                        <small>Add Money</small>
                                    </div>
                                </div>
                                <div class="font-weight-bolder text-success">+ $590</div>
                            </div>
                            <div class="transaction-item">
                                <div class="media">
                                    <div class="avatar bg-light-warning rounded">
                                        <div class="avatar-content">
                                            <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="transaction-title">Mastercard</h6>
                                        <small>Ordered Food</small>
                                    </div>
                                </div>
                                <div class="font-weight-bolder text-danger">- $23</div>
                            </div>
                            <div class="transaction-item">
                                <div class="media">
                                    <div class="avatar bg-light-info rounded">
                                        <div class="avatar-content">
                                            <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="transaction-title">Transfer</h6>
                                        <small>Refund</small>
                                    </div>
                                </div>
                                <div class="font-weight-bolder text-success">+ $98</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Transaction Card -->
            </div>

        </section>
        <!-- Dashboard Ecommerce ends -->

    </div>
@endsection
@push('css')
    <style>

    </style>
{{--    <link rel="stylesheet" href="/css/pages/app-invoice-list.min.css">--}}
{{--    <link rel="stylesheet" href="/css/pages/app-user.min.css">--}}
@endpush
