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
        <form class="add-new-record modal-content pt-0" action="{{$module_url}}/edit/{{$row->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('slider.edit bannar')}}</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-fullname">{{trans('slider.description')}}</label>
                    <textarea
                        class="form-control dt-full-name"
                        id="basic-icon-default-fullname"
                        placeholder="{{trans('slider.description')}}"
                        name="description"
                    >{{$row->description}}</textarea>
                    @if($errors->has('description'))
                        <span class="text-danger">
                                {{$errors->first('description')}}
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-post">{{trans('slider.link')}}</label>
                    <input
                        type="url"
                        id="basic-icon-default-post"
                        class="form-control dt-post"
                        placeholder="{{trans('slider.link')}}"
                        value="{{$row->link !='#' ?$row->link : null}}"
                        name="link"
                    />
                    @if($errors->has('link'))
                        <span class="text-danger">
                                {{$errors->first('link')}}
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="custom-control custom-control-primary custom-switch">
                        <label class="form-label" for="basic-icon-default-post">{{trans('slider.status')}}</label>
                        <input type="checkbox" name="is_active" @if($row->is_active) checked="" @endif class="custom-control-input" id="statusSwitchEdit">
                        <label class="custom-control-label" for="statusSwitchEdit"></label>
                    </div>
                </div>
                <div class="form-group col-12" >
                    <label class="form-label" for="customFile">{{trans('slider.bannar')}}</label>
                    <div class="custom-file">
                        <input type="file" name="image"  class="custom-file-input" id="editBannar">
                        <label class="custom-file-label" for="editBannar">{{trans('app.choose file')}}</label>
                        @if($errors->has('image'))
                            <span class="text-danger">
                                {{$errors->first('image')}}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="avatar-group">
                        <img
                            src="{{$row->image}}"
                            alt="Avatar"
                            height="400"
                            width="1050"
                        />
                    </div>
                </div>

                <button type="submit" class="btn btn-primary data-submit mr-1">{{trans('app.save')}}</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">{{trans('app.cancel')}}</button>
            </div>
        </form>
    </div>
@endsection
