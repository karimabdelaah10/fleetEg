@include('BaseApp::form.select',
       [
           'name'=>'category_id',
           'options'=>$categories,
           'attributes'=>
           [
               'id'=>'category_id',
               'class'=>'form-control',
               'label'=>trans('products.category'),
               'placeholder'=>trans('products.category'),
               'required' =>1
           ]
       ])

@include('BaseApp::form.input',[
    'name'=>'title',
     'value'=> $row->title ?? null,
     'type'=>'text',
     'attributes'=>[
         'id'=>'title',
         'class'=>'form-control',
     'label'=>trans('products.title'),
     'placeholder'=>trans('products.title'),
     'required'=>1]
     ])
@include('BaseApp::form.input',[
    'name'=>'price',
     'value'=> $row->price ?? null,
     'type'=>'text',
     'attributes'=>[
         'id'=>'price',
         'class'=>'form-control',
     'label'=>trans('products.price'),
     'placeholder'=>trans('products.price'),
     'required'=>1]
     ])
@include('BaseApp::form.input',[
    'name'=>'commission',
     'value'=> $row->commission ?? null,
     'type'=>'text',
     'attributes'=>[
         'id'=>'commission',
         'class'=>'form-control',
     'label'=>trans('products.commission'),
     'placeholder'=>trans('products.commission'),
     'required'=>1]
     ])
@include('BaseApp::form.input',[
    'name'=>'media_url',
     'value'=> $row->media_url ?? null,
     'type'=>'text',
     'attributes'=>[
         'id'=>'media_url',
         'class'=>'form-control',
     'label'=>trans('products.media_url'),
     'placeholder'=>trans('products.media_url'),
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
@include('BaseApp::form.file',[
    'name'=>'image',
    'attributes'=>[
            'id'=>'image',
            'class'=>'form-control custom-file-input',
            'image_class'=>'avatar-group pull-up my-0 mb-2 mt-1',
            'image_type'=>'large',
            'height'=>empty($row->getRawOriginal('image')) ? 50 :300,    // create new bannar id row->image empty
            'width'=>empty($row->getRawOriginal('image')) ? 50 :300,
            'label'=>trans('products.image'),
            'value'=>$row->getRawOriginal('image')
            ]
            ])
