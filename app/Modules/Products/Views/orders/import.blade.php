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
        {!! Form::model($row,['method' => 'post','files' => true , 'class'=>"add-new-record modal-content pt-0" ] ) !!} {{ csrf_field() }}
        <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">{{trans('specs.edit spec')}}</h5>
        </div>
        <div class="modal-body flex-grow-1">

            @include('BaseApp::form.file',[
                'name'=>'file',
                'attributes'=>[
                        'id'=>'file',
                        'class'=>'form-control custom-file-input',
                        'image_class'=>'avatar-group pull-up my-0 mb-2 mt-1',
                        'image_type'=>'large',
                        'height'=>empty($row->getRawOriginal('file')) ? 50 :300,    // create new bannar id row->image empty
                        'width'=>empty($row->getRawOriginal('file')) ? 50 :300,
                        'label'=>trans('orders.file'),
                        'value'=>$row->getRawOriginal('file')
                        ]
                        ])


            <button type="submit" class="btn btn-primary data-submit mr-1">{{trans('app.save')}}</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">{{trans('app.cancel')}}</button>

        </div>
        {!! Form::close() !!}
    </div>
@endsection
