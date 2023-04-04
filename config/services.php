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

    'github' => [
        'client_id' => env('6ff809d36cc47e572e08'),
        'client_secret' => env('0ae9b755e36abd17fd164e84b4b0a02c99bbd818'),
        'redirect' => 'http://localhost:8000/auth/github/callback',
    ],

    'facebook' => [
        'client_id' => env('241969928293088'),
        'client_secret' => env('6987dc7997f40356d853308cccdd2727'),
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '898436280686-jhb1uh51a1s7cq33bvq2l7g7r79jqrkb.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/authorized/google/callback',
    ],

];
