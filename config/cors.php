<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'], // Permite GET, POST, PUT, DELETE, OPTIONS

    'allowed_origins' => ['*'], // Permite todo

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'], // ¡CRUCIAL! Permite Content-Type, X-Requested-With, etc.

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false, // IMPORTANTE: false si usas '*' en origins
];
