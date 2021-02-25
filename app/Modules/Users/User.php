<?php

namespace App\Modules\Users;

use App\Modules\BaseApp\Traits\CreatedBy;
use App\Modules\BaseApp\Traits\HasAttach;
use App\Modules\Countries\Country;
use App\Modules\MortgageApplications\MortgageApplication;
use App\Modules\Notification\Deletednotifications;
use App\Modules\Notification\Notification;
use App\Modules\Options\Option;
use App\Modules\Users\Enums\CustomersEnum;
use App\Modules\Users\Models\Customer;
use App\Modules\Users\Models\Role;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Spatie\Activitylog\Traits\LogsActivity;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use SoftDeletes, LaratrustUserTrait, CreatedBy, HasAttach, Notifiable , LogsActivity;

    protected static $attachFields = [
        'profile_picture' => [
            'sizes' => ['small' => 'crop,400x300', 'large' => 'resize,800x600'],
            'path' => 'storage/uploads'
        ],
    ];
    protected $table = "users";
    protected $fillable = [
        'first_name',
        'last_name',
        'type',
        'email',
        'mobile_number',
        'address',
        'last_logged_in_at',
        'confirmed',
        'super_admin',
        'is_admin',
        'password',
        'is_active',
        'profile_picture',
        'language',
        'facebook_id' ,
        'google_id',
        'apple_id',
        'notification_flag',
        'gender_id'
    ];

    public function setPasswordAttribute($value)
    {
        if (trim($value)) {
            $this->attributes['password'] = bcrypt(trim($value));
        }
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', '=', 1)->where('confirmed', 1);
    }

    public function getUserTypes()
    {
        return UserEnums::creatableUserTypes();
    }

    public function getNameAttribute($value)
    {
          $name = '';
          if ($this->first_name) {
              $name.= $this->first_name;
          }

          if ($this->last_name) {
              $name.= " " . $this->last_name;
          }

          return $name;
    }

    public function getRoles()
    {
        return Role::get();
    }
    public function scopeNotAdmin($query)
    {
        return $query->where('is_admin', '=', 0);
    }

    public function scopeNotSuperAdmin($query)
    {
        return $query->where('super_admin', '=', 0);
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

    public function getLocales()
    {
        $locales = [];

        foreach (config('laravellocalization.supportedLocales') as $key => $value) {
            $locales[$key] = $value['native'];
        }

        return $locales;
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function customer(){

        return $this->hasOne(Customer::class , 'user_id');
    }

    public function getGenders(){

        return Option::whereType('gender')->where('is_active' , 1)->get()->pluck('title', 'id');
    }

    public function getMaritalStatus(){

        return Option::whereType('marital_status')->where('is_active' , 1)->get()->pluck('title', 'id');
    }

    public function getNationalities(){

        return Country::listsTranslations('name')->get()->pluck('name' , 'id');
    }

    public function getWorkTypes() {

        return CustomersEnum::workTypes();
    }

    public function getAgent(){
        if($this->customer){
            $application =MortgageApplication::where('customer_id' , $this->customer->id)
                ->where('agent_id' ,'!=', null)
                ->orderBy('id' , 'desc')
                ->with('agent')
                ->first();
            if ($application){
            return $application->agent;
            }
        }
        return null;
    }

    public function getDeletedNotificationIds(){
        return $this->deletedNotifications()->pluck('notification_id');
    }
    public function gender() {

        return $this->belongsTo(Option::class , 'gender_id')->where('type', 'gender');
    }
    public function deletedNotifications() {

        return $this->hasMany(Deletednotifications::class , 'user_id');
    }

    public function export()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(
            new   \App\Modules\Users\Exports\UsersExport,
            'users' . "_" . date("Y-m-d H:i:s").'.xlsx');
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return $this->toArray();
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function seenNotifications()
    {
        return $this->belongsToMany(Notification::class , 'seen_notifications');
    }
}
