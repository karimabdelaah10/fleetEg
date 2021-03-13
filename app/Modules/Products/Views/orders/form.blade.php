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
