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
            <h5 class="modal-title" id="exampleModalLabel">{{trans('products.add_product_spec')}}</h5>
        </div>
        <div class="modal-body flex-grow-1">
            <div  class="form-group">
                <div class="row mg-t-20 mb-1">
                    <label class="col-sm-! form-control-label">
                        {{trans('products.specs')}}
                        <span class="tx-danger">*
                </span></label>
                    <div class="col-sm-11 mg-t-10 mg-sm-t-0">
                        <select class="form-control" name="spec_id">
                            <option selected disabled>{{trans('products.select specs')}}</option>
                                @if(!empty($rows))
                                    @foreach($rows as $element)
                                    <option value="{{@$element->id}}">{{@$element->title}}</option>
                                    @endforeach
                                @endif
                                {{trans('products.select specs')}}</option>
                        </select>
                    </div>
                </div>
                <hr>

            </div>
            <button type="submit" class="btn btn-primary data-submit mr-1">{{trans('app.save')}}</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">{{trans('app.cancel')}}</button>

        </div>
        {!! Form::close() !!}
    </div>
@endsection
