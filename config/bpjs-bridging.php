<?php

// config for HanzoAsashi/LaravelBpjsBridging
return [
    'app_timezone' => env('APP_TIMEZONE', 'Asia/Makassar'),
    'vclaim' => [
        'consid' => env('BPJS_CONSID', ''),
        'secret_key' => env('BPJS_SCREET_KEY', ''),
        'url' => env('BPJS_BASE_URL', 'https://new-api.bpjs-kesehatan.go.id:8080'),
        'service_name' => env('BPJS_SERVICE_NAME','new-vclaim-rest')
    ],

    'pcare' => [
        'consid' => env('BPJS_PCARE_CONSID', ''),
        'secret_key' => env('BPJS_PCARE_SCREET_KEY', ''),
        'username' => env('BPJS_PCARE_USERNAME', ''),
        'password' => env('BPJS_PCARE_PASSWORD', ''),
        'app_code' => env('BPJS_PCARE_APP_CODE', '095'),
        'url' => env('BPJS_PCARE_BASE_URL', 'https://dvlp.bpjs-kesehatan.go.id:9081'),
        'service_name' => env('BPJS_PCARE_SERVICE_NAME','pcare-rest-v3.0')
    ],
];
