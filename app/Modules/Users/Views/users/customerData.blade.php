<br>
    @php
        $customer = $row->customer;
    @endphp

    <tr>
        <td width="25%" class="align-left">{{trans('users.Marital Status')}}</td>
        <td width="75%" class="align-left">{{@$customer->maritalStatus ? @$customer->maritalStatus->title : ''}}</td>
    </tr>

    <tr>
        <td width="25%" class="align-left">{{trans('users.Nationality')}}</td>
        <td width="75%" class="align-left">{{@$customer->nationality ? @$customer->nationality->name : ''}}</td>
    </tr>

    <tr>
        <td width="25%" class="align-left">{{trans('users.National ID')}}</td>
        <td width="75%" class="align-left">{{@$customer->national_id}}</td>
    </tr>

    <tr>
        <td width="25%" class="align-left">{{trans('users.National ID Image')}}</td>
        <td width="75%" class="align-left">{!! viewImage(@$customer->national_id_image_front , 'large' , 'uploads', ['width' => 200]) !!}</td>
    </tr>

    <tr>
        <td width="25%" class="align-left">{{trans('users.National ID Image')}}</td>
        <td width="75%" class="align-left">{!! viewImage(@$customer->national_id_image_back , 'large' , 'uploads', ['width' => 200]) !!}</td>
    </tr>

    <tr>
        <td width="25%" class="align-left">{{trans('users.Work Type')}}</td>
        <td width="75%" class="align-left">{{@$customer->work_type}}</td>
    </tr>

    <tr>
        <td width="25%" class="align-left">{{trans('users.Job Title')}}</td>
        <td width="75%" class="align-left">{{@$customer->job_title}}</td>
    </tr>

    <tr>
        <td width="25%" class="align-left">{{trans('users.Company Name')}}</td>
        <td width="75%" class="align-left">{{@$customer->company_name}}</td>
    </tr>

    <tr>
        <td width="25%" class="align-left">{{trans('users.Company Address')}}</td>
        <td width="75%" class="align-left">{{@$customer->company_address}}</td>
    </tr>

    <tr>
        <td width="25%" class="align-left">{{trans('users.Employment Document')}}</td>
        <td width="75%" class="align-left">{!! viewImage(@$customer->employment_document , 'large' , 'uploads', ['width' => 200]) !!}</td>
    </tr>

    <tr>
        <td width="25%" class="align-left">{{trans('users.Utility Bill')}}</td>
        <td width="75%" class="align-left">{!! viewImage(@$customer->utility_bill , 'large' , 'uploads' , ['width' => 200]) !!}</td>
    </tr>
