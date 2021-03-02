
    @include('BaseApp::form.select',
        [
            'name'=>'status',
            'options'=>$statuses,
            'attributes'=>
            [
                'id'=>'user_type',
                'class'=>'form-control',
                'label'=>trans('app.status'),
                'placeholder'=>trans('app.status')
            ]
        ])

