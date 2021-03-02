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
        <form
            class="add-new-record modal-content pt-0"
            action="{{$module_url}}/edit/{{$row->id}}"
            method="post" enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('user.edit user')}}</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="form-group">
                    <label class="form-label" for="add_name">{{trans('user.name')}}</label>
                    <input
                        type="text"
                        class="form-control dt-full-name"
                        id="add_name"
                        value="{{$row->name}}"
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
                        value="{{$row->mobile_number}}"
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
                        value="{{$row->email}}"
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
                    <label class="form-label" for="add_address">{{trans('user.address')}}</label>
                    <input
                        type="text"
                        id="add_address"
                        value="{{$row->address}}"
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
                        <input type="checkbox" name="is_active" @if($row->is_active) checked="" @endif class="custom-control-input" id="statusSwitchAdd">
                        <label class="custom-control-label" for="statusSwitchAdd"></label>
                    </div>
                </div>
                <div class="form-group" >
                    <label class="form-label" for="customFile">{{trans('user.profile_picture')}}</label>
                    <div class="custom-file">
                        <input type="file" name="profile_picture"  class="custom-file-input" id="addProfilePicture">
                        <label class="custom-file-label" for="addProfilePicture">{{trans('app.choose file')}}</label>
                        @if($errors->has('profile_picture'))
                            <span class="text-danger">
                                        {{$errors->first('profile_picture')}}
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="avatar-group">
                        <div data-toggle="tooltip"
                             data-popup="tooltip-custom"
                             data-placement="top"
                             title="" class="avatar pull-up my-0"
                             data-original-title="{{$row->name}}">
                            <img src="{{$row->profile_picture}}"
                                 alt="Avatar"
                                 height="100" width="100">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary data-submit mr-1">{{trans('app.save')}}</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">{{trans('app.cancel')}}</button>
            </div>
        </form>
    </div>
@endsection
