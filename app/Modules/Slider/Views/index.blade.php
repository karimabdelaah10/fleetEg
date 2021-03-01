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
                           data-target="#modals-slide-in">{{trans('slider.add bannar')}}</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-4">
                            <thead>
                            <tr>
                                <th >#</th>
                                <th >{{trans('slider.description')}}</th>
                                <th >{{trans('slider.link')}}</th>
                                <th >{{trans('slider.bannar')}}</th>
                                <th >{{trans('slider.status')}}</th>
                                <th >{{trans('slider.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($rows))
                                @foreach($rows as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>
                                            @if(!empty($row->description))
                                            <p
                                                class=""
                                                data-toggle="popover"
                                                data-content="{{$row->description}}"
                                                data-trigger="hover"
                                                data-original-title="{{trans('slider.description popover title')}}"
                                            >
                                                {{splitString($row->description , 0 , 20)}}..
                                            </p>
                                            @endif
                                            </td>
                                        <td>
                                            <a href="{{$row->link}}">{{$row->link}}</a>
                                            </td>
                                        <td>
                                            <div class="avatar-group">
                                                    <img
                                                        src="{{$row->image}}"
                                                        alt="Avatar"
                                                        height="50"
                                                        width="120"
                                                    />
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-pill {{$row->is_active ? 'badge-light-success':'badge-light-danger'}} mr-1"> {{$row->is_active ? trans('slider.active'):trans('slider.inactive')}} </span>
                                        </td>
                                        <td>
                                            @include('BaseApp::partials.actions' ,['actions'=>['edit' ,'delete'] , $row])
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
                <form class="add-new-record modal-content pt-0" action="/slider/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                    <div class="modal-header mb-1">
                        <h5 class="modal-title" id="exampleModalLabel">{{trans('slider.add bannar')}}</h5>
                    </div>
                    <div class="modal-body flex-grow-1">
                        <div class="form-group">
                            <label class="form-label" for="basic-icon-default-fullname">{{trans('slider.description')}}</label>
                            <textarea
                                class="form-control dt-full-name"
                                id="basic-icon-default-fullname"
                                placeholder="{{trans('slider.description')}}"
                                name="description"
                            ></textarea>
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
                                    <input type="checkbox" checked="" class="custom-control-input" id="statusSwitchAdd">
                                    <label class="custom-control-label" for="statusSwitchAdd"></label>
                                </div>
                        </div>
                        <div class="form-group col-8" >
                            <label class="form-label" for="customFile">{{trans('slider.bannar')}}</label>
                            <div class="custom-file">
                                <input type="file" name="image" required class="custom-file-input" id="addBannar">
                                <label class="custom-file-label" for="addBannar">{{trans('app.choose file')}}</label>
                                @if($errors->has('image'))
                                    <span class="text-danger">
                                        {{$errors->first('image')}}
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
    <script src="/js/pages/components-popovers.min.js"></script>

    <script src="/js/pages/jquery.bootpag.min.js"></script>
    <script src="/js/pages/jquery.twbsPagination.min.js"></script>

    <script src="/js/pages/components-pagination.js"></script>

@endpush
