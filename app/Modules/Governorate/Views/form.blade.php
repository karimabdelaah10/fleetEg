
@include('BaseApp::form.input',[
    'name'=>'title',
     'value'=> $row->title ?? null,
     'type'=>'text',
     'attributes'=>[
         'id'=>'title',
         'class'=>'form-control',
     'label'=>trans('governorate.title'),
     'placeholder'=>trans('governorate.title'),
     'required'=>0]
     ])
@include('BaseApp::form.input',[
    'name'=>'shipping_coast',
     'value'=> $row->shipping_coast ?? null,
     'type'=>'number',
     'attributes'=>[
         'id'=>'title',
         'class'=>'form-control',
     'min'=>0,
     'label'=>trans('governorate.shipping_coast'),
     'placeholder'=>trans('governorate.shipping_coast'),
     'required'=>1]
     ])
@include('BaseApp::form.switch',[
    'name'=>'is_active',
    'value'=> $row->is_active ?? null,
     'attributes'=>[
         'id'=>'is_active',
         'class'=>'form-control',
     'label'=>trans('app.status')]
     ])
