@include('BaseApp::form.textarea',[
    'name'=>'description',
     'value'=> $row->name ?? null,
     'type'=>'textarea',
     'attributes'=>[
            'rows'=>2,
            'cols'=>2,
            'id'=>'description',
            'class'=>'form-control',
     'label'=>trans('slider.description'),
     'placeholder'=>trans('slider.description'),
     'required'=>0]
     ])

@include('BaseApp::form.input',[
    'name'=>'link',
     'value'=> $row->link ?? null,
     'type'=>'url',
     'attributes'=>[
         'id'=>'mobile_number',
         'class'=>'form-control',
     'label'=>trans('slider.link'),
     'placeholder'=>trans('slider.link'),
     'required'=>0]
     ])
@include('BaseApp::form.switch',[
    'name'=>'is_active',
    'value'=> $row->is_active ?? null,
     'attributes'=>[
         'id'=>'is_active',
         'class'=>'form-control',
     'label'=>trans('app.status')]
     ])
@include('BaseApp::form.file',[
    'name'=>'image',
    'attributes'=>[
            'id'=>'image',
            'class'=>'form-control custom-file-input',
            'image_class'=>'avatar-group pull-up my-0 mb-2 mt-1',
            'image_type'=>'large',
            'height'=>empty($row->getRawOriginal('image')) ? 50 :400,    // create new bannar id row->image empty
            'width'=>empty($row->getRawOriginal('image')) ? 50 :1050,
            'label'=>trans('slider.bannar'),
            'value'=>$row->getRawOriginal('image')
            ]
            ])
