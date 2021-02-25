<?php

namespace App\Modules\Users\Models;


use App\Modules\BaseApp\BaseModel;
use App\Modules\BaseApp\Traits\HasAttach;
use App\Modules\Countries\Country;
use App\Modules\MortgageApplications\MortgageApplication;
use App\Modules\Options\Option;
use App\Modules\Users\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends BaseModel
{
    use SoftDeletes , HasAttach;

    protected $fillable = [
        "work_type",
        "job_title",
        "company_name",
        "company_address",
        "employment_document",
        "utility_bill",
        'marital_status',
        'nationality_id',
        'passport_number',
        'national_id',
        'national_id_image_front',
        'national_id_image_back',
        'user_id',
        "net_income",
        "additional_monthly_income",
        "hr_document",
        "work_field",
        "income_proof",
    ];

    protected static $attachFields = [
        'national_id_image_front' => [
            'sizes' => ['small' => 'resize,400x300', 'large' => 'resize,800x600'],
            'path' => 'storage/uploads'
        ],
        'national_id_image_back' => [
            'sizes' => ['small' => 'resize,400x300', 'large' => 'resize,800x600'],
            'path' => 'storage/uploads'
        ],
        'employment_document' => [
            'sizes' => ['small' => 'resize,400x300', 'large' => 'resize,800x600'],
            'path' => 'storage/uploads'
        ],
        'utility_bill' => [
            'sizes' => ['small' => 'resize,400x300', 'large' => 'resize,800x600'],
            'path' => 'storage/uploads'
        ]
    ];

    public function getData()
    {
        return $this;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function maritalStatus() {

        return $this->belongsTo(Option::class , 'marital_status')->where('type', 'marital_status');
    }

    public function nationality() {

        return $this->belongsTo(Country::class , 'nationality_id');
    }
    public function applications() {

        return $this->hasMany(MortgageApplication::class , 'customer_id');
    }
}
