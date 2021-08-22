@include('BaseApp::form.input',[
    'name'=>'requested_amount',
     'value'=> $row->requested_amount ?? null,
     'type'=>'text',
     'attributes'=>[
         'id'=>'requested_amount',
         'class'=>'form-control',
     'label'=>trans('moneyrequest.requested_amount'),
     'placeholder'=>trans('moneyrequest.requested_amount'),
     'required'=>1]
     ])
