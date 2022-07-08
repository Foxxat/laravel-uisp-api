<?php
// config for Wharfs/UISPApiClient
return [
    'name' => 'UISPApiClient',
    'config' => [
        'host' => env('UISP_HOST'),
        'port' => env('UISP_PORT', 443),
        'user' => env('UISP_USERNAME'),
        'password' => env('UISP_PASSWORD'),
        'verifyssl' => env('UISP_VERIFTYSSL', true),
        'debug' => env('UISP_DEBUG', false),      
    ]
];
