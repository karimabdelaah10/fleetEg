<?php

namespace App\Modules\Users\Enums;

abstract class CustomersEnum
{
    /**
     * List of all Work types used in customers table
     */
    public const CORPORATE  = "corporate",
                EMPLOYEE = "employee",
                SELF_EMPLOYED = "self employed";

    public static function workTypes()
    {
        return [
            self::CORPORATE => self::CORPORATE,
            self::EMPLOYEE => self::EMPLOYEE,
            self::SELF_EMPLOYED => self::SELF_EMPLOYED
        ];
    }
}
