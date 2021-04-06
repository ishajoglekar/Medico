<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'twilio' => [
        // 'sid' => env('TWILIO_ACCOUNT_SID'),
        // 'token' => env('TWILIO_ACCOUNT_TOKEN'),
        // 'key' => env('TWILIO_API_KEY'),
        // 'secret' => env('TWILIO_API_SECRET')

        'sid' => 'ACdca59173b2435fc1e7abb09d5268adaf',
        'token' => '59ca2162c1011105ddca28c9acbb6333',
        'key' => 'SKb9ab424d08099d6bc8ccd26aec4317a2',
        'secret' => 'kf5ghapmBevoTz6oPYKrlslk31fkFEzy'
    ]
];

