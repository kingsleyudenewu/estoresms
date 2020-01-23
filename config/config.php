<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'response' => [
        'OK' => 'Successful',
        '-2904' => 'SMS sending failed',
        '-2905' => 'Invalid username/password combination',
        '-2906' => 'Credit exhausted',
        '-2907' => 'Gateway unavailable',
        '-2908' => 'Invalid schedule date format',
        '-2909' => 'Unable to schedule',
        '-2910' => 'Username is empty',
        '-2911' => 'Password is empty',
        '-2912' => 'Recipient is empty',
        '-2913' => 'Message is empty',
        '-2914' => 'Sender is empty',
        '-2915' => 'One or more required fields are empty',
        '-2916' => 'Blocked message content',
        '-2917' => 'Blocked sender ID',
    ],
    'token' => env('ESTORE_TOKEN'),
    'email' => env('ESTORE_EMAIL'),
    'username' => env('ESTORE_USERNAME'),
    'password' => env('ESTORE_PASSWORD'),
    'network_list' => 'https://estoresms.com/network_list/v/2',
    'url' => 'https://www.estoresms.com/',

];
