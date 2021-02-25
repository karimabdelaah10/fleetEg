<?php

namespace App\Modules\Users\Enums;

abstract class UserEnum
{
    /**
     * List of all Work types used in customers table
     */
    public const IOS  = "ios",
                ANDROID = "android";

    public static function deviceTypes()
    {
        return [self::ANDROID , self::IOS];
    }
}
