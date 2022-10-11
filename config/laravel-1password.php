<?php

return [
    'credentials' => [
        'base_url' => env('LARAVEL_1PASSWORD_API_BASE_URL', 'http://localhost:8080/'),
        'authentication_token' => env('LARAVEL_1PASSWORD_API_AUTHENTICATION_TOKEN'),
    ]
];
