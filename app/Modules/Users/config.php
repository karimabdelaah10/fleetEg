<?php
return [
    'name' => 'Users Module',
    'description' => 'Users Modules',
    'status' => false,
    'autoload' => [

    ],
    'middleware' => [
        'isSuperAdmin' => 'IsSuperAdmin'
    ]
];
