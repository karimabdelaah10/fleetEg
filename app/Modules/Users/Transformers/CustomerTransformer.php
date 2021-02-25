<?php

namespace App\Modules\Users\Transformers;

use App\Modules\Users\Models\Customer;
use League\Fractal\TransformerAbstract;

class CustomerTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
    ];
    protected $availableIncludes = [];

    /**
     * @param Customer $customer
     * @return array
     */
    public function transform(Customer $customer)
    {
        $transfromedData =  [
            'id' => (int) $customer->id,
            'work_type' => (string) $customer->work_type,
            'job_title' => (string) $customer->job_title,
            'company_name' => (string) $customer->company_name,
            'company_address' => (string) $customer->company_address,
            'marital_status' => (int) $customer->marital_status,
            'nationality_id' => (int) $customer->nationality_id,
            'passport_number' => (string) $customer->passport_number,
            'national_id' => (string) $customer->national_id,
            "employment_document"   => image($customer->employment_document , 'large') ?? null,
            "utility_bill"   => image($customer->utility_bill , 'large') ?? null,
            "national_id_image_front"   => image($customer->national_id_image_front,"large") ?? null,
            "national_id_image_back"   => image($customer->national_id_image_back,"large") ?? null,
            "net_income" => (string) $customer->net_income,
            "additional_monthly_income" => (string) $customer->additional_monthly_income,
            "hr_document" => image($customer->hr_document,"large") ?? null,
            "work_field" => (string) $customer->work_field,
            "income_proof" => image($customer->income_proof,"large") ?? null
        ];

        return $transfromedData;
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'work_type' => 'work_type',
            'job_title' => 'job_title',
            'company_name' => 'company_name',
            'company_address' => 'company_address',
            'marital_status' => 'marital_status',
            'nationality_id' => 'nationality_id',
            'passport_number' => 'passport_number',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'work_type' => 'work_type',
            'job_title' => 'job_title',
            'company_name' => 'company_name',
            'company_address' => 'company_address',
            'marital_status' => 'marital_status',
            'nationality_id' => 'nationality_id',
            'passport_number' => 'passport_number',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
