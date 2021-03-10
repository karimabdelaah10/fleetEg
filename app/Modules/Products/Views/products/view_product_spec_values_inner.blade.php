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
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            {{ trans('products.view inner spec value') }}
                        </h4>
                        <a href="{{$module_url}}/add_product_spec_values_inner/{{$row->spec_value_id}}" class="add-new btn btn-primary mt-50">{{trans('products.add inner spec value')}}</a>

                    </div>

                    <div class="table-responsive">
                        <table class="table mb-4">
                            <thead>
                            <tr>
                                <th >#</th>
                                <th >{{trans('specvalues.title')}}</th>
                                <th >{{trans('products.amount')}}</th>
                                <th >{{trans('products.image')}}</th>
                                <th >{{trans('app.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($rows))
                                @foreach($rows as $element)
                                    <tr>
                                        <td>{{@$element->id}}</td>
                                        <td>{{@$element->value->title}}</td>
                                        <td>{{@$element->stock}}</td>
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
                                        </td>                                        <td>
                                            <div class="dropdown dropright">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow " data-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{$module_url}}/delete_products_spec_value/{{@$element->id}}">
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
