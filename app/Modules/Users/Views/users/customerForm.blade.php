<br>

<div class="role role-customer" style="display: none;">
    <div class="card-header bd-0 tx-medium bg-light h3 ">
        {{ trans('users.Basic Info') }}
    </div>

    @include('BaseApp::form.select',['name'=>'marital_status','options'=>$row->getMaritalStatus(), 'value' => ($row->customer ? $row->customer->marital_status : null),'attributes'=>['class'=>'form-control','stared' => 'stared','label'=>trans('users.Marital Status'),'placeholder'=>trans('users.Marital Status')]])

    @include('BaseApp::form.select',['name'=>'nationality_id','options'=>$row->getNationalities() , 'value' => ($row->customer ? $row->customer->nationality_id : null) ,'attributes'=>['class'=>'form-control','stared' => 'stared','label'=>trans('users.Nationality'),'placeholder'=>trans('users.Nationality')]])

    @php
        $attributes=['class'=>'form-control','label'=>trans('users.National ID'),'stared' => 'stared','placeholder'=>trans('users.National ID')];
    @endphp

    @include('BaseApp::form.input',['name'=>'national_id' , 'value' => ($row->customer ? $row->customer->national_id : null) ,'type'=>'text','attributes'=>$attributes])

    @include('BaseApp::form.file',['name'=>'national_id_image_front',
        'attributes'=>['class'=>'form-control custom-file-input',
        'label'=> trans('users.National ID Image'),'stared' => 'stared','value'=>($row->customer ? $row->customer->national_id_image_front : null)]])

    @include('BaseApp::form.file',['name'=>'national_id_image_back',
        'attributes'=>['class'=>'form-control custom-file-input',
        'label'=> trans('users.National ID Image'),'stared' => 'stared','value'=>($row->customer ? $row->customer->national_id_image_back : null)]])

    <div class="card-header bd-0 tx-medium bg-light h3 ">
        {{ trans('users.Work Info') }}
    </div>
    @include('BaseApp::form.select',['name'=>'work_type','options'=>$row->getWorkTypes() , 'value' => ($row->customer ? $row->customer->work_type : null) ,'attributes'=>['class'=>'form-control','stared' => 'stared','label'=>trans('users.Work Type'),'placeholder'=>trans('users.Work Type')]])

    @php
        $attributes=['class'=>'form-control','stared' => 'stared','label'=>trans('users.Job Title'),'placeholder'=>trans('users.Job Title')];
    @endphp

    @include('BaseApp::form.input',['name'=>'job_title' , 'value' => ($row->customer ? $row->customer->job_title : null),'type'=>'text','attributes'=>$attributes])

    @php
        $attributes=['class'=>'form-control','stared' => 'stared','label'=>trans('users.Company Name'),'placeholder'=>trans('users.Company Name')];
    @endphp

    @include('BaseApp::form.input',['name'=>'company_name', 'value' => ($row->customer ? $row->customer->company_name : null),'type'=>'text','attributes'=>$attributes])

    @php
        $attributes=['class'=>'form-control','stared' => 'stared','label'=>trans('users.Company Address'),'placeholder'=>trans('users.Company Address')];
    @endphp

    @include('BaseApp::form.input',['name'=>'company_address','stared' => 'stared', 'value' => ($row->customer ? $row->customer->company_address : null),'type'=>'text','attributes'=>$attributes])

    @include('BaseApp::form.file',['name'=>'employment_document',
    'attributes'=>['class'=>'form-control custom-file-input','stared' => 'stared',
    'label'=> trans('users.Employment Document'),'value'=>($row->customer ? $row->customer->employment_document : null)]])

     @include('BaseApp::form.file',['name'=>'utility_bill',
    'attributes'=>['class'=>'form-control custom-file-input','stared' => 'stared',
    'label'=> trans('users.Utility Bill'),'value'=>($row->customer ? $row->customer->utility_bill : null)]])

</div>