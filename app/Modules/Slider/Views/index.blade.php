@extends('BaseApp::layouts.master')
@section('title')
<h6 class="slim-pagetitle">
    {{ @$page_title }}
    @if(can('create-'.$module))
    <a href="{{$module}}/create" class="btn btn-success">
        <i class="fa fa-plus"></i> {{trans('app.Create')}}
    </a>
    @endif
</h6>
@endsection
@section('content')
<div class="section-wrapper">
    @if(can('view-'.$module))
    @if (!$rows->isEmpty())
    <div class="table-responsive">
        <table class="table display responsive nowrap">
            <thead>
                <tr>
                    <th class="wd-10p">{{trans('slider.ID')}} </th>
                    <th class="wd-10p">{{trans('slider.Title')}} </th>
                    <th class="wd-10p">{{trans('slider.Index')}} </th>
                    <th class="wd-10p">{{trans('slider.Is Active')}} </th>
                    <th class="wd-10p">{{trans('slider.Created at')}}</th>
                    <th class="wd-30p">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                <tr>
                    <td class="center">{{$row->id}}</td>
                    <td class="center">{{$row->title}}</td>
                    <td class="center">{{$row->index}}</td>
                    <td class="center"><img src="img/{{($row->is_active)?'check.png':'close.png'}}"></td>
                    <td class="center">{{$row->created_at}}</td>
                    <td class="center">
                        @include('BaseApp::partials.actions' ,['actions'=>['edit' , 'view' ,'delete'] , $row])
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    {{trans("options.There is no results")}}
    @endif
    @endif
</div>
@endsection
