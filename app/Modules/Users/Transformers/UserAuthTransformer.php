<?php

namespace App\Modules\Users\Transformers;

use App\Modules\Agents\Transformers\AgentTransform;
use App\Modules\BaseApp\Enums\ResourceTypes;
use App\Modules\MortgageApplications\Transformers\MortgageApplicationsTransformer;
use App\Modules\Users\Models\Customer;
use App\Modules\Users\User;
use App\Modules\Users\UserEnums;
use League\Fractal\TransformerAbstract;

class UserAuthTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        "agent"
    ];

    protected $availableIncludes = [
        "customer",
    ];

    /**
     * @param User $user
     * @return array
     */
    public function transform(User $user)
    {
        $transfromedData =  [
            'id' => (int) $user->id,
            'name' => (string) $user->name,
            'first_name' => (string) $user->first_name,
            'last_name' => (string) $user->last_name,
            'type' => (string) $user->type,
            'email' => (string) $user->email,
            'mobile_number' => (string) $user->mobile_number,
            'gender' => (string) $user->gender ? $user->gender->title : null,
            'gender_id' => (int) $user->gender_id ,
            'address' => (string) $user->address,
            'language' => (string) ($user->language ?? config('app.locale')),
            'has_agent' => $user->getAgent() ? true : false,
            'notification_flag' => $user->notification_flag ? true : false
        ];

        if ($user->user_status) {
            $transfromedData['user_status'] = (string) $user->user_status;
        }

        if ($user->profile_picture) {
            $transfromedData['profile_picture'] = [
                'small' => (string) image($user->profile_picture, 'small'),
                'large' => (string) image($user->profile_picture, 'large'),
            ];
        } else {
            $transfromedData['profile_picture'] = [
                'small' => null,
                'large' => null,
            ];
        }

        return $transfromedData;
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'name' => 'name',
            'type' => 'type',
            'email' => 'email',
            'mobile_number' => 'mobile_number',
            'address' => 'address',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'first_name' => 'name',
            'type' => 'type',
            'email' => 'email',
            'mobile_number' => 'mobile_number',
            'address' => 'address',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public function includeCustomer(User $user) {
        if($user->customer){
            return $this->item($user->customer , new CustomerTransformer() , UserEnums::CUSTOMER);
        }
    }

    public function includeAgent(User $user)
    {
        if ($user->getAgent()) {
            return $this->item($user->getAgent(), new AgentTransform(), ResourceTypes::Agent);
        }
    }
}
