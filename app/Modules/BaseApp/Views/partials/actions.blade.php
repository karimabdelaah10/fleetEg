<div class="dropdown dropright">
    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow " data-toggle="dropdown">
        <i data-feather="more-vertical"></i>
    </button>
    <div class="dropdown-menu">
@if(in_array('view' , $actions))
        <a class="dropdown-item" href="{{$module_url}}/view/{{$row->id}}">
            <i data-feather="eye" class="mr-50"></i>
            <span>{{trans('app.view')}}</span>
        </a>
@endif
@if(in_array('edit' , $actions))
        <a class="dropdown-item" href="{{$module_url}}/edit/{{$row->id}}">
            <i data-feather="edit-2" class="mr-50"></i>
            <span>{{trans('app.edit')}}</span>
        </a>
@endif
@if(in_array('delete' , $actions))
        <a class="dropdown-item" href="{{$module_url}}/delete/{{$row->id}}">
{{--            data-confirm="ssss"--}}
            <i data-feather="trash" class="mr-50"></i>
            <span>{{trans('app.delete')}}</span>
        </a>
@endif

    </div>
</div>
