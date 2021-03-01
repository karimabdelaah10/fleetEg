<?php

namespace App\Modules\Users;

use App\Modules\BaseApp\Traits\CreatedBy;
use App\Modules\BaseApp\Traits\HasAttach;
use App\Modules\Users\Enums\UserEnum;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use  HasAttach, Notifiable ;

    protected static $attachFields = [
        'profile_picture' => [
            'sizes' => ['small' => 'crop,400x300', 'large' => 'resize,800x600'],
            'path' => 'storage/uploads'
        ],
    ];
    protected $table = "users";
    protected $fillable = [
        'type',
        'name',
        'address',
        'email',
        'mobile_number',
        'email_verified_at',
        'last_logged_in_at',
        'is_active',
        'password',
        'profile_picture',
    ];

    public function setPasswordAttribute($value)
    {
        if (trim($value)) {
            $this->attributes['password'] = bcrypt(trim($value));
        }
    }
    public function getProfilePictureAttribute($value)
    {
        if (!empty($value)){
            return image($value , 'large');
        }
        return  'https://via.placeholder.com/150';
    }
    public function gettypeAttribute($value)
    {
        if (!empty($value)){
            return  trans('user.'.$value);
        }
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', '=', 1);
    }

    public function getUserTypes()
    {
        return UserEnums::creatableUserTypes();
    }


    public function scopeNotSuperAdmin($query)
    {
        return $query->where('type', '!=', UserEnum::SUPER_ADMIN);
    }

    public function scopeWithoutLoggedUser($query)
    {
        return $query->where('id', '!=', auth()->id());
    }

    public function getData()
    {
        $query = $this->withoutLoggedUser()
            ->notsuperadmin()
            ->when(request('type'), function ($q) {
                return $q->where('type', request('type'));
            })
            ->when(request('deleted') == 'yes', function ($q) {
                return $q->onlyTrashed();
            });
        return $query;
    }

    public function export()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(
            new   \App\Modules\Users\Exports\UsersExport,
            'users' . "_" . date("Y-m-d H:i:s").'.xlsx');
    }

}
