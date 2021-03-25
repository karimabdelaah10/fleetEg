<?php

namespace App\Modules\Users;

use App\Modules\BaseApp\Traits\CreatedBy;
use App\Modules\BaseApp\Traits\HasAttach;
use App\Modules\MoneyProcess\Models\Moneyrequest;
use App\Modules\Products\Models\Favouriteproduct;
use App\Modules\Products\Models\Order;
use App\Modules\Products\Models\Product;
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
        'admin_type',
        'name',
        'address',
        'email',
        'mobile_number',
        'email_verified_at',
        'last_logged_in_at',
        'is_active',
        'is_verified',
        'password',
        'profile_picture',
        'available_balance',
    ];

    public function setPasswordAttribute($value)
    {
        if (trim($value)) {
            $this->attributes['password'] = bcrypt(trim($value));
        }
    }
    public function getProfilePictureAttribute($value): string
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



    public function scopeNotSuperAdmin($query)
    {
        return $query->where('type', '!=', UserEnum::SUPER_ADMIN);
    }
    public function scopeAdmin($query)
    {
        return $query->where('type', '=', UserEnum::ADMIN);
    }

    public function scopeCustomer($query)
    {
        return $query->where('type', '=', UserEnum::CUSTOMER);
    }
   public function scopeFiltered($query)
    {
        if (request()->query('not-verified')){
             $query->where('is_verified', '=', 0);
        }
        return $query;
    }

    public function scopeWithoutLoggedUser($query)
    {
        return $query->where('id', '!=', auth()->id());
    }

    public function getData()
    {
        return $this->withoutLoggedUser()
            ->notsuperadmin()
            ->when(request('type'), function ($q) {
                return $q->where('type', request('type'));
            })
            ->when(request('deleted') == 'yes', function ($q) {
                return $q->onlyTrashed();
            });
    }

    public function favourite_products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class , 'favouriteproducts');
    }
    public function moneyRequests(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Moneyrequest::class , 'user_id')->orderByDesc('id');
    }
    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class , 'user_id')->orderByDesc('id');
    }
}
