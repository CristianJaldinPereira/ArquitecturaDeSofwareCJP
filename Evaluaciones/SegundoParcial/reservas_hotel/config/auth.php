<?php

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'usuarios'),
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'usuarios',  // Cambiado a 'usuarios'
        ],
    ],

    'providers' => [
        'usuarios' => [                // Nuevo provider 'usuarios'
            'driver' => 'eloquent',
            'model' => App\Models\usuarios::class, // Modelo que creaste
        ],

        // Puedes dejar el 'users' por defecto si quieres
        // 'users' => [
        //     'driver' => 'eloquent',
        //     'model' => App\Models\User::class,
        // ],
    ],

    'passwords' => [
        'usuarios' => [                // Cambiado a 'usuarios'
            'provider' => 'usuarios',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
