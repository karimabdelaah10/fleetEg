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
                        <a href="{{$module_url}}/edit/{{$row->id}}" class="add-new btn btn-primary mt-50">{{trans('products.edit product')}}</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-4">
                            <tr>
                                <td>{{trans('products.title')}}</td>
                                <td>
                                    {{@$row->title}}
                                </td>
                            </tr>
                            <tr>
                                <td>{{trans('products.category')}}</td>
                                <td>
                                    {{@$row->category->title}}
                                </td>
                            </tr>
                            <tr>
                                <td>{{trans('products.price')}}</td>
                                <td>
                                    {{@$row->price}}
                                </td>
                            </tr>
                            <tr>
                                <td>{{trans('products.commission')}}</td>
                                <td>
                                    {{@$row->commission}}
                                </td>
                            </tr>
                            <tr>
                                <td>{{trans('products.discount')}}</td>
                                <td>
                                    <span class="badge badge-pill {{$row->discount ? 'badge-light-success':'badge-light-danger'}} mr-1"> {{$row->discount ? trans('products.discount_true'):trans('products.discount_false')}} </span>
                                </td>
                            </tr>
                            @if($row->discount)
                                <tr>
                                    <td>{{trans('products.two_pc_discount')}}</td>
                                    <td>
                                        {{@$row->two_pc_discount}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{trans('products.plus_two_pc_discount')}}</td>
                                    <td>
                                        {{@$row->plus_two_pc_discount}}
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <td>{{trans('products.media_url')}}</td>
                                <td>
                                    <a href="{{@$row->media_url}}">{{@$row->media_url}}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>{{trans('app.status')}}</td>
                                <td>
                                    <span class="badge badge-pill {{$row->is_active ? 'badge-light-success':'badge-light-danger'}} mr-1"> {{$row->is_active ? trans('app.active'):trans('app.inactive')}} </span>
                                </td>
                            </tr>
                            <tr>
                                <td>{{trans('products.image')}}</td>
                                <td>
                                   <img src="{{image($row->image , 'large')}}">                                </td>
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
                            {{ trans('products.specs list') }}
                        </h4>
                        <a href="{{$module_url}}/add_products_spec/{{$row->id}}" class="add-new btn btn-primary mt-50">{{trans('specs.add spec')}}</a>

                    </div>

                    <div class="table-responsive">
                        <table class="table mb-4">
                            <thead>
                            <tr>
                                <th >#</th>
                                <th >{{trans('specs.title')}}</th>
                                <th >{{trans('app.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($row->specs))
                                @foreach($row->specs as $element)
                                    <tr>
                                        <td>{{$element->pivot->id}}</td>
                                        <td>{{$element->title}}</td>
                                        <td>
                                            <div class="dropdown dropright">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow " data-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{$module_url}}/view_product_spec_values/{{@$element->pivot->id}}">
                                                            <i data-feather="eye" class="mr-50"></i>
                                                            <span>{{trans('products.view spec values')}}</span>
                                                        </a>
{{--                                                        <a class="dropdown-item" href="{{$module_url}}/edit/{{$element->id}}">--}}
{{--                                                            <i data-feather="edit-2" class="mr-50"></i>--}}
{{--                                                            <span>{{trans('app.edit')}}</span>--}}
{{--                                                        </a>--}}
                                                        <a class="dropdown-item" href="{{$module_url}}/delete_products_spec/{{@$element->pivot->id}}">
                                                            {{--            data-confirm="ssss"--}}
                                                            <i data-feather="trash" class="mr-50"></i>
                                                            <span>{{trans('app.delete')}}</span>
                                                        </a>
                                                </div>
                                            </div>

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
