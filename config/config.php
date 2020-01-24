<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'sms_response' => [
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
    'bill_payment_category' => [
        'tv',
        'internet',
        'electricity',
        'waec',
    ],

    'bill_payment_response' => [
        'OK' => 'Successful',
        'FAIL' => 'Not Successful',
        'B001' => 'Authentication Failed',
        'B002' => 'Operation not allowed on account',
        'B003' => 'API not enabled for this account',
        'B004' => 'Invalid request',
        'B005' => 'Product has no plan in this category',
        'B006' => 'Validation failed',
        'B007' => 'Insufficient Balance',
        'B008' => 'Invalid Amount',
        'B009' => 'Operation Failed',
    ],

    'airtime_response' => [
        'OK' => 'Successful',
        'FAIL' => 'Not Successful',
        'P000' => 'Incomplete Information',
        'P001' => 'Authentication failed',
        'P002' => 'Invalid Network selected',
        'P003' => 'Phone number is required',
        'P004' => 'Amount is required',
        'P005' => 'Amount is not numeric',
        'P006' => 'Minimum recharge allowed per transaction N1',
        'P007' => 'Invalid phone number',
        'P008' => 'Network selected for phone number is invalid',
        'P009' => 'Insufficient Balance',
        'P010' => 'API Token not enabled',
        'P011' => 'Process Failed',
        'P012' => 'Unable to complete request',
        'P013' => 'Maximum recharge allowed per transaction N50,000.',
        'P014' => 'Maximum number of pins that can be generated at once is 1000.',
    ],

    'token' => env('ESTORE_TOKEN'),
    'email' => env('ESTORE_EMAIL'),
    'username' => env('ESTORE_USERNAME'),
    'password' => env('ESTORE_PASSWORD'),
    'network_list' => 'https://estoresms.com/network_list/v/2',
    'url' => 'https://www.estoresms.com/',

];
