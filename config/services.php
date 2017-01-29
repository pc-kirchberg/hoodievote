<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => 'pupilscom-esl1.eu',
        'secret' => '[SECRET]',
    ],


    'ses' => [
        'key' => '[SECRET]',
        'secret' => '[SECRET]',
        'region' => 'eu-west-1'
    ],

    'facebook' => [
        'client_id' => '[SECRET]',
        'client_secret' => '[SECRET]',
        'redirect' => env('SERVICE_REDIRECT', 'http://hoodievote-facebook.local-dev.pupilscom-esl1.eu:81/callback')
    ],

    'rollbar' => [
        'access_token' => '[SECRET]',
        'level' => 'debug'
    ]

];
