<?php

namespace App\Modules\Users\Models;

use App\Modules\Users\Exports\RoleExport;
use App\Modules\Users\UserEnums;
use Laratrust\Models\LaratrustRole;
use Maatwebsite\Excel\Facades\Excel;

class Role extends LaratrustRole
{
    protected $table = "roles";
    protected $fillable = [
        'name',
        'display_name',
        'description',
        'type',
        'is_default'
    ];

    public function getData() {
        return $this;
    }

    public function getUserTypes() {
        $types =  UserEnums::userTypes();
        unset($types['customer']);
        return $types;
    }

    public function export() {
        return Excel::download(new RoleExport, 'roles' . "_" . date("Y-m-d H:i:s") . '.xlsx');

    }
}
