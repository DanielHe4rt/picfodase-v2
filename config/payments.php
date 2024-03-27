<?php

return [
    'default_provider' => 'picpay',
    'default_notification' => 'sendgrid',

    'nofications' => [
        'sendgrid' => [
            'api_key' => '',
        ],
        'twilio' => [
            'api_key' => '',
        ]
    ],
    'providers' => [
        'picpay' => [
            'url' => 'https://run.mocky.io/v3/5794d450-d2e2-4412-8131-73d0293ac1cc',
        ],
        'mastercard' => [
            'url' => 'https://run.mocky.io/v3/5794d450-d2e2-4412-8131-73d0293ac1cc',
        ]
    ]
];
