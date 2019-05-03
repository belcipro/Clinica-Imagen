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
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID','525497878781-1oa96ha3sr636tdeou4rv28j910o60t0.apps.googleusercontent.com'),         // Your GitHub Client ID
        'client_secret' => env('GOOGLE_CLIENT_SECRET','6fLDh39GaXR0UCIkfp40AE5r'), 
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],
    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID','461530364338382'),         // Your GitHub Client ID
        'client_secret' => env('FACEBOOK_CLIENT_SECRET','1b6a6b2b643d24ba29b4a0155cb67939'), 
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],
    'twitter' => [
        'client_id' => env('TWITTER_CLIENT_ID','Lwf8Zq4c1jmYF296aSGvbJ0hl'),         // Your GitHub Client ID
        'client_secret' => env('TWITTER_CLIENT_SECRET','FNI9CdLC3KR9VBOeN9JZFUEvj9bwK5GUuOanzDIerJzvgOWhOs'), 
        'redirect' => 'http://localhost:8000/login/twitter/callback',
    ],


];
