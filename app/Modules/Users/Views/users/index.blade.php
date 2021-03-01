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
                                <th >{{trans('user.profile picture')}}</th>
                                <th >{{trans('app.status')}}</th>
                                <th >{{trans('app.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($rows))
                                @foreach($rows as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->address}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->mobile_number}}</td>
                                        <td>
                                            <div class="avatar-group">
                                                <div data-toggle="tooltip"
                                                     data-popup="tooltip-custom"
                                                     data-placement="top"
                                                     title="" class="avatar pull-up my-0"
                                                     data-original-title="{{$row->name}}">
                                                    <img src="{{$row->profile_picture}}"
                                                         alt="Avatar"
                                                         height="35" width="35">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-pill {{$row->is_active ? 'badge-light-success':'badge-light-danger'}} mr-1"> {{$row->is_active ? trans('app.active'):trans('app.inactive')}} </span>
                                        </td>
                                        <td>
                                            @include('BaseApp::partials.actions' ,['actions'=>['edit' ,'delete' ,'view'] , $row])
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
                        <div class="form-group">
                            <label class="form-label" for="add_name">{{trans('user.name')}}</label>
                            <input
                                type="text"
                                class="form-control dt-full-name"
                                id="add_name"
                                placeholder="{{trans('user.name')}}"
                                name="name"
                                required
                            >
                            @if($errors->has('name'))
                                <span class="text-danger">
                                        {{$errors->first('name')}}
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="add_mobile_number">{{trans('user.mobile_number')}}</label>
                            <input
                                type="text"
                                id="add_mobile_number"
                                class="form-control dt-post"
                                placeholder="{{trans('user.mobile_number')}}"
                                name="mobile_number"
                                required
                            />
                            @if($errors->has('mobile_number'))
                                <span class="text-danger">
                                        {{$errors->first('mobile_number')}}
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="add_email">{{trans('user.email')}}</label>
                            <input
                                type="text"
                                id="add_email"
                                class="form-control dt-post"
                                placeholder="{{trans('user.email')}}"
                                name="email"
                                required
                            />
                            @if($errors->has('email'))
                                <span class="text-danger">
                                        {{$errors->first('email')}}
                                    </span>
                            @endif
                        </div>
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
                        <div class="form-group">
                            <label class="form-label" for="add_address">{{trans('user.address')}}</label>
                            <input
                                type="text"
                                id="add_address"
                                class="form-control dt-post"
                                placeholder="{{trans('user.address')}}"
                                name="address"
                            />
                            @if($errors->has('address'))
                                <span class="text-danger">
                                        {{$errors->first('address')}}
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-control-primary custom-switch">
                                <label class="form-label" for="basic-icon-default-post">{{trans('app.status')}}</label>
                                <input type="checkbox" name="is_active" checked="" class="custom-control-input" id="statusSwitchAdd">
                                <label class="custom-control-label" for="statusSwitchAdd"></label>
                            </div>
                        </div>
                        <div class="form-group col-8" >
                            <label class="form-label" for="customFile">{{trans('user.profile picture')}}</label>
                            <div class="custom-file">
                                <input type="file" name="profile_picture" required class="custom-file-input" id="addProfilePicture">
                                <label class="custom-file-label" for="addProfilePicture">{{trans('app.choose file')}}</label>
                                @if($errors->has('profile_picture'))
                                    <span class="text-danger">
                                        {{$errors->first('profile_picture')}}
                                    </span>
                                @endif
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
<script>
    import Input from "../../../../../vendor/laravel/breeze/stubs/inertia/resources/js/Components/Input";
    export default {
        components: {Input}
    }
</script>
    <script src="/js/pages/jquery.twbsPagination.min.js"></script>
    <script src="/js/pages/components-pagination.js"></script>
@endpush
