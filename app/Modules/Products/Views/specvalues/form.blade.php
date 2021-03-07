@include('BaseApp::form.input',[
    'name'=>'title',
     'value'=> $row->title ?? null,
     'type'=>'text',
     'attributes'=>[
         'id'=>'title',
         'class'=>'form-control',
     'label'=>trans('specvalues.title'),
     'placeholder'=>trans('specvalues.title'),
     'required'=>0]
     ])

@include('BaseApp::form.select',
    [
        'name'=>'spec_id',
        'options'=>$specs,
        'attributes'=>
        [
            'id'=>'spec_id',
            'class'=>'form-control',
            'label'=>trans('specvalues.spec'),
            'placeholder'=>trans('specvalues.spec')
        ]
    ])


@include('BaseApp::form.switch',[
    'name'=>'is_active',
    'value'=> $row->is_active ?? null,
     'attributes'=>[
         'id'=>'is_active',
         'class'=>'form-control',
     'label'=>trans('app.status')]
     ])
