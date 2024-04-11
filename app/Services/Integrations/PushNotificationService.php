<?php

namespace App\Services\Integrations;

use App\Interfaces\NotificationInterface;

class PushNotificationService implements NotificationInterface
{
    public function send($user, $notification)
    {
        // Codigo para enviar el push notification, en la prueba dice que no es necesario realmente envarlo

        return 'Push notification sent';
    }
}
