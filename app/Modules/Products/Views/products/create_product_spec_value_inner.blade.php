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
            <h5 class="modal-title" id="exampleModalLabel">{{trans('products.add spec value')}}</h5>
        </div>
        <div class="modal-body flex-grow-1">
            <div  class="form-group">
                <div class="row mg-t-20 mb-1">
                    <label class="col-sm-! form-control-label">
                        {{trans('products.specs values')}}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-11 mg-t-10 mg-sm-t-0">
                        <select class="form-control" name="spec_value_id" required>
                            <option selected disabled>{{trans('products.specs values')}}</option>
                            @if(!empty($rows))
                                @foreach($rows as $element)
                                    <option value="{{@$element->id}}">{{@$element->title}}</option>
                                    @endforeach
                                    @endif
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="form-label">
                        {{trans('products.amount')}}
                    </label>
                    <input id="title"  placeholder="{{trans('products.amount')}}"  name="stock" type="text" class="form-control">
                </div>
                @include('BaseApp::form.file',[
                         'name'=>'image',
                         'attributes'=>[
                                'id'=>'image',
                                'class'=>'form-control custom-file-input',
                                'image_class'=>'avatar-group pull-up my-0 mb-2 mt-1',
                                'image_type'=>'small',
                                'height'=>empty($row->getRawOriginal('image')) ? 50 :300,    // create new bannar id row->image empty
                                'width'=>empty($row->getRawOriginal('image')) ? 50 :300,
                                'label'=>trans('products.image'),
                                'value'=>$row->getRawOriginal('image')
                                ]
                         ])
                <input type="hidden" name="product_id" value="{{$row->product_id}}">
                <input type="hidden" name="parent_spec_value_id" value="{{$row->product_spec_value_id}}">

                <hr>

            </div>
            <button type="submit" class="btn btn-primary data-submit mr-1">{{trans('app.save')}}</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">{{trans('app.cancel')}}</button>

        </div>
        {!! Form::close() !!}
    </div>
@endsection
