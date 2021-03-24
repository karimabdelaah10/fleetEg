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
                        <a href="{{$module_url}}/create" class="add-new btn btn-primary mt-50">{{trans('products.add product')}}</a>
                    </div>

                    <div class="table-responsive">
                        <div class="col-12 mb-4">
                            <form method="get">
                                <div class="input-group input-group-merge">
                                    <input
                                        type="text"
                                        name="search_key"
                                        class="form-control search-product"
                                        id="shop-search"
                                        value="{{request()->search_key}}"
                                        placeholder="{{trans('app.search_in_products')}}"
                                        aria-describedby="shop-search"
                                    />
                                    <div class="input-group-append">
                                <span class="input-group-text">
                                    <i data-feather="search"
                                       class="text-muted">
                                    </i>
                                </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <table class="table mb-4">
                            <thead>
                            <tr>
                                <th >#</th>
                                <th >{{trans('products.title')}}</th>
                                <th >{{trans('products.category')}}</th>
                                <th >{{trans('products.price')}}</th>
                                <th >{{trans('products.image')}}</th>
                                <th >{{trans('app.status')}}</th>
                                <th >{{trans('app.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($rows))
                                @foreach($rows as $element)
                                    <tr>
                                        <td>{{@$element->id}}</td>
                                        <td>{{@$element->title}}</td>
                                        <td>{{@$element->category->title }}</td>
                                        <td>{{@$element->price }}</td>
                                        <td>
                                            <div class="avatar-group">
                                                <div data-toggle="tooltip"
                                                     data-popup="tooltip-custom"
                                                     data-placement="top"
                                                     title="" class="avatar pull-up my-0"
                                                     data-original-title="{{@$element->title}}">
                                                    <img src="{{image($element->image , 'small')}}"
                                                         alt="Avatar"
                                                         height="100" width="100">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-pill {{$element->is_active ? 'badge-light-success':'badge-light-danger'}} mr-1"> {{$element->is_active ? trans('app.active'):trans('app.inactive')}} </span>
                                        </td>
                                        <td>
                                            @include('BaseApp::partials.actions' ,['actions'=>['view','edit' ,'delete'] , $element])
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
