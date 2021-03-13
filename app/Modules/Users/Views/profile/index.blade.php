@extends('BaseApp::layouts.master')
@section('page-title')
    {{ @$page_title }}
@endsection
@section('content')
    <div class="content-body"><!-- Dashboard Ecommerce Starts -->
        <section id="dashboard-ecommerce">
            <div class="row match-height">
                <!-- Medal Card -->
                <!-- Profile Card -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card card-profile">
                        <img
                            src="/images/banner/banner-12.jpg"
                            class="img-fluid card-img-top"
                            alt="Profile Cover Photo"
                        />
                        <div class="card-body">
                            <div class="profile-image-wrapper">
                                <div class="profile-image">
                                    <div class="avatar">
                                        <img src="{{$row->profile_picture}}"
                                             alt="Profile Picture" />
                                    </div>
                                </div>
                            </div>
                            <h3>{{$row->name}}</h3>
                            <h6 class="text-muted">{{$row->type}}</h6>
                            <h6 class="text-capitalize">{{$row->email}}</h6>
                            <h6 class="text-capitalize">{{$row->address}}</h6>
                            <div class="badge badge-light-primary profile-badge">{{$row->mobile_number}}</div>
                            <hr class="mb-2" />
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted font-weight-bolder">Followers</h6>
                                    <h3 class="mb-0">10.3k</h3>
                                </div>
                                <div>
                                    <h6 class="text-muted font-weight-bolder">Projects</h6>
                                    <h3 class="mb-0">156</h3>
                                </div>
                                <div>
                                    <h6 class="text-muted font-weight-bolder">Rank</h6>
                                    <h3 class="mb-0">23</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Profile Card -->

                <!--/ Medal Card -->

                <!-- Statistics Card -->
                <div class="col-xl-8 col-md-6 col-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <h4 class="card-title">الارقام الاحصائيه الخاصه بك</h4>
                            <div class="d-flex align-items-center">
                                <p class="card-text font-small-2 mr-25 mb-0">يتم تجديد الارقام تلقائيا</p>
                            </div>
                        </div>
                        <div class="card-body statistics-body">
                            <div class="row">
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <div class="media">
                                        <div class="avatar bg-light-primary mr-2">
                                            <div class="avatar-content">
                                                <i class="avatar-icon" data-feather="trending-up"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">230k</h4>
                                            <p class="card-text font-small-3 mb-0">عدد الطلبات التى تم تسليمها</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <div class="media">
                                        <div class="avatar bg-light-info mr-2">
                                            <div class="avatar-content">
                                                <i class="avatar-icon" data-feather="box"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">8.549k</h4>
                                            <p class="card-text font-small-3 mb-0">عدد الطلبات فى حاله الانتظار</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                    <div class="media">
                                        <div class="avatar bg-light-danger mr-2">
                                            <div class="avatar-content">
                                                <i class="avatar-icon" data-feather="heart"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">1.423k</h4>
                                            <p class="card-text font-small-3 mb-0">عدد المنتجات المفضله لك</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12">
                                    <div class="media">
                                        <div class="avatar bg-light-success mr-2">
                                            <div class="avatar-content">
                                                <i class="avatar-icon" data-feather="dollar-sign"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">$9745</h4>
                                            <p class="card-text font-small-3 mb-0">اجمالى العموالات الخاصه بك</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Statistics Card -->
            </div>
            <div class="row match-height">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">Product Orders</h4>
                            <div class="dropdown chart-dropdown">
                                <button
                                    class="btn btn-sm border-0 dropdown-toggle px-50"
                                    type="button"
                                    id="dropdownItem2"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    Last 7 Days
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem2">
                                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="product-order-chart"></div>
                            <div class="d-flex justify-content-between mb-1">
                                <div class="d-flex align-items-center">
                                    <i data-feather="circle" class="font-medium-1 text-primary"></i>
                                    <span class="font-weight-bold ml-75">Finished</span>
                                </div>
                                <span>23043</span>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <div class="d-flex align-items-center">
                                    <i data-feather="circle" class="font-medium-1 text-warning"></i>
                                    <span class="font-weight-bold ml-75">Pending</span>
                                </div>
                                <span>14658</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <i data-feather="circle" class="font-medium-1 text-danger"></i>
                                    <span class="font-weight-bold ml-75">Rejected</span>
                                </div>
                                <span>4758</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card earnings-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="card-title mb-1">Earnings</h4>
                                    <div class="font-small-2">This Month</div>
                                    <h5 class="mb-1">$4055.56</h5>
                                    <p class="card-text text-muted font-small-2">
                                        <span class="font-weight-bolder">68.2%</span><span> more earnings than last month.</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <div id="earnings-donut-chart"></div>
                                </div>
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
                                    <a class="dropdown-item" href="/profile/money-requests">{{trans('user.all money requests')}}</a>
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
