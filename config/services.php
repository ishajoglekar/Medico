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
        'sid' => env('TWILIO_VIDEO_SID'),
        'token' => env('TWILIO_VIDEO_TOKEN'),
        'key' => env('TWILIO_VIDEO_KEY'),
        'secret' => env('TWILIO_VIDEO_SECRET'),

        // 'sid' => 'ACdca59173b2435fc1e7abb09d5268adaf',
        // 'token' => '7635792b444a53f499644876a26337e6',
        // 'key' => 'SK3abe8d322c1bd43ba2b2bc0a47ba6111',
        // 'secret' => 'v8nZjTAIJ39fwYgAocqdVKBwtCCsI3rP'
    ]
];

