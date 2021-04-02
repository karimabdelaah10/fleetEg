@include('BaseApp::form.select',
       [
           'name'=>'status',
           'options'=>$statuses,
           'attributes'=>
           [
               'id'=>'status',
               'class'=>'form-control',
               'label'=>trans('orders.status'),
               'placeholder'=>trans('orders.status'),
               'required' =>1
           ]
       ])

@include('BaseApp::form.input',[
    'name'=>'shipping_number',
     'value'=> $row->shipping_number ?? null,
     'type'=>'text',
     'attributes'=>[
         'id'=>'shipping_number',
         'class'=>'form-control',
     'label'=>trans('orders.shipping_number'),
     'placeholder'=>trans('orders.shipping_number'),
     ]
     ])
