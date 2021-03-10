@foreach($rows as $row)
    @include('BaseApp::form.input',['name'=>$row->id,
        'value'=> $row->value ?? null,
        'type'=>'text','attributes'=>['class'=>'form-control',
        'label'=>trans('configs.'.$row->title),
        'placeholder'=>trans('configs.'.$row->title),
        'required'=>1]])
@endforeach

