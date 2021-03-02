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
                        <a href="#" class="add-new btn btn-primary mt-50"
                           data-toggle="modal"
                           data-target="#modals-slide-in">{{trans('user.add user')}}</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-4">
                            <thead>
                            <tr>
                                <th >#</th>
                                <th >{{trans('user.name')}}</th>
                                <th >{{trans('user.address')}}</th>
                                <th >{{trans('user.email')}}</th>
                                <th >{{trans('user.mobile_number')}}</th>
                                <th >{{trans('user.profile_picture')}}</th>
                                <th >{{trans('app.status')}}</th>
                                <th >{{trans('app.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($rows))
                                @foreach($rows as $element)
                                    <tr>
                                        <td>{{$element->id}}</td>
                                        <td>{{$element->name}}</td>
                                        <td>{{$element->address}}</td>
                                        <td>{{$element->email}}</td>
                                        <td>{{$element->mobile_number}}</td>
                                        <td>
                                            <div class="avatar-group">
                                                <div data-toggle="tooltip"
                                                     data-popup="tooltip-custom"
                                                     data-placement="top"
                                                     title="" class="avatar pull-up my-0"
                                                     data-original-title="{{$element->name}}">
                                                    <img src="{{$element->profile_picture}}"
                                                         alt="Avatar"
                                                         height="35" width="35">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-pill {{$element->is_active ? 'badge-light-success':'badge-light-danger'}} mr-1"> {{$element->is_active ? trans('app.active'):trans('app.inactive')}} </span>
                                        </td>
                                        <td>
                                            @include('BaseApp::partials.actions' ,['actions'=>['edit' ,'delete' ,'view'] , $element])
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
        <!-- Modal to add new record -->
        <div class="modal modal-slide-in fade" id="modals-slide-in">
            <div class="modal-dialog sidebar-sm">
                <form class="add-new-record modal-content pt-0" action="{{$module_url}}/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                    <div class="modal-header mb-1">
                        <h5 class="modal-title" id="exampleModalLabel">{{trans('user.add user')}}</h5>
                    </div>
                    <div class="modal-body flex-grow-1">
                        @include($views.'.form',$row)
                        <div class="form-group">
                            <label for="account_new_password">{{trans('user.new_password')}}</label>
                            <div class="input-group form-password-toggle input-group-merge">
                                <input
                                    class="form-control"
                                    id="account_new_password"
                                    name="password"
                                    placeholder="············"
                                    type="password"
                                    required
                                />
                                <div class="input-group-append">
                                    <div class="input-group-text cursor-pointer">
                                        <i data-feather="eye"></i>
                                    </div>
                                </div>
                            </div>
                            @if($errors->has('password'))
                                <span class="text-danger">
                                    {{trans('validation.old_password_mismatch')}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="account-retype-new-password">{{trans('user.re_new_password')}}</label>
                            <div class="input-group form-password-toggle input-group-merge">
                                <input
                                    class="form-control"
                                    id="account-retype-new-password"
                                    name="password_confirmation"
                                    placeholder="············"
                                    type="password"
                                    required
                                />
                                <div class="input-group-append">
                                    <div class="input-group-text cursor-pointer"><i
                                            data-feather="eye"></i></div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary data-submit mr-1">{{trans('app.save')}}</button>
                        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">{{trans('app.cancel')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="/js/pages/jquery.twbsPagination.min.js"></script>
    <script src="/js/pages/components-pagination.js"></script>
@endpush
