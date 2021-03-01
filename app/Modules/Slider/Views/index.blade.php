@extends('BaseApp::layouts.master')
@section('page-title')
    {{ @$page_title }}
@endsection
@section('content')
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
                                <th>#</th>
                                <th>{{trans('slider.description')}}</th>
                                <th>{{trans('slider.link')}}</th>
                                <th>{{trans('slider.bannar')}}</th>
                                <th>{{trans('slider.status')}}</th>
                                <th>{{trans('slider.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($rows))
                                @foreach($rows as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>
                                            <p
                                                class=""
                                                data-toggle="popover"
                                                data-content="{{$row->description}}"
                                                data-trigger="hover"
                                                data-original-title="{{trans('slider.description popover title')}}"
                                            >
                                                {{splitString($row->description , 0 , 2)}} ....
                                            </p>
                                            </td>
                                        <td>
                                            <a href="{{$row->link}}">{{$row->link}}</a>
                                            </td>
                                        <td>
                                            <div class="avatar-group">
                                                    <img
                                                        src="{{$row->image}}"
                                                        alt="Avatar"
                                                        height="100"
                                                        width="235"
                                                    />
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-pill
                                             {{$row->is_active ? 'badge-light-success':'badge-light-danger'}}
                                              mr-1">
                                                {{$row->is_active ? trans('slider.active'):trans('slider.inactive')}}
                                            </span>
                                        </td>
                                        <td>
                                            @include('BaseApp::partials.actions' ,['actions'=>['edit' ,'delete'] , $row])
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        {{$rows->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Tables end -->
        <!-- Modal to add new record -->
        <div class="modal modal-slide-in fade" id="modals-slide-in">
            <div class="modal-dialog sidebar-sm">
                <form class="add-new-record modal-content pt-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                    <div class="modal-header mb-1">
                        <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
                    </div>
                    <div class="modal-body flex-grow-1">
                        <div class="form-group">
                            <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                            <input
                                type="text"
                                class="form-control dt-full-name"
                                id="basic-icon-default-fullname"
                                placeholder="John Doe"
                                aria-label="John Doe"
                            />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-icon-default-post">Post</label>
                            <input
                                type="text"
                                id="basic-icon-default-post"
                                class="form-control dt-post"
                                placeholder="Web Developer"
                                aria-label="Web Developer"
                            />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-icon-default-email">Email</label>
                            <input
                                type="text"
                                id="basic-icon-default-email"
                                class="form-control dt-email"
                                placeholder="john.doe@example.com"
                                aria-label="john.doe@example.com"
                            />
                            <small class="form-text text-muted"> You can use letters, numbers & periods </small>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-icon-default-date">Joining Date</label>
                            <input
                                type="text"
                                class="form-control dt-date"
                                id="basic-icon-default-date"
                                placeholder="MM/DD/YYYY"
                                aria-label="MM/DD/YYYY"
                            />
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label" for="basic-icon-default-salary">Salary</label>
                            <input
                                type="text"
                                id="basic-icon-default-salary"
                                class="form-control dt-salary"
                                placeholder="$12000"
                                aria-label="$12000"
                            />
                        </div>
                        <button type="button" class="btn btn-primary data-submit mr-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="/js/pages/components-popovers.min.js"></script>

@endpush
