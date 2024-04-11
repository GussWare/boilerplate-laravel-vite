<?php 
return [
    'channels' => [
        'email' => [
            'class'=> 'App\Services\Integrations\EmailNotificationService'
        ],
        'sms' => [
            'class'=> 'App\Services\Integrations\SMSNotificationService'
        ],
        'push' => [
            'class'=> 'App\Services\Integrations\PushNotificationService'
        ],
    ],
];