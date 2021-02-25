@extends('BaseApp::layouts.master')
@section('title')
<h6 class="slim-pagetitle">
    {{ @$page_title }}
    @if(can('create-'.$module))
    <a href="{{$module}}/create" class="btn btn-success">
        <i class="fa fa-plus"></i> {{trans('app.Create')}}
    </a>
    @endif
    @if(can('view-'.$module))
    <a href="{{$module}}/export?{{@$_SERVER['QUERY_STRING']}}" class="btn btn-primary">
        <i class="fa fa-arrow-down"></i> {{trans('app.Export')}}
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
                    <th class="wd-5p">{{trans('users.ID')}} </th>
                    @if(! request('type'))
                        <th class="wd-10p">{{trans('users.Is Admin')}} </th>
                    @endif
                    <th class="wd-15p">{{trans('users.Name')}} </th>
                    <th class="wd-15p">{{trans('users.Email')}} </th>
                    <th class="wd-15p">{{trans('users.Mobile')}} </th>
                    <th class="wd-10p">{{trans('users.Confirmed')}} </th>
                    <th class="wd-15p">{{trans('users.Created at')}}</th>
                    <th class="wd-25p">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                <tr>
                    <td class="center">{{$row->id}}</td>

                    @if(! request('type'))
                        <td class="center"><img src="img/{{($row->is_admin)?'check.png':'close.png'}}"></td>
                    @endif

                    <td class="center">{{$row->full_name}}</td>
                    <td class="center">{{$row->email}}</td>
                    <td class="center">{{$row->mobile_number}}</td>
                    <td class="center">{{$row->confirmed ? trans('users.Confirmed') : trans('users.Not Confirmed')}}</td>
                    <td class="center">{{$row->created_at}}</td>
                    <td class="center">
                        <?php
                            $actions = ['view'];
                            if (request('deleted') != 'yes'){
                                if ($row->type != 'customer'){
                                    array_push($actions , 'edit');
                                }
                                array_push($actions ,'delete');
                            }
                        ?>
                        @include('BaseApp::partials.actions' ,['actions'=>$actions , $row])
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    {{trans("users.There is no results")}}
    @endif
    @endif

    <br>
    {{ $rows->links() }}
</div>
@endsection
