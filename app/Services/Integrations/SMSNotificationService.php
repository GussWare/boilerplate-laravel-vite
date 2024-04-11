<?php

namespace App\Services\Integrations;

use App\Interfaces\NotificationInterface;

class SMSNotificationService implements NotificationInterface
{
    public function send($user, $notification)
    {
        // Codigo para enviar la notification sms, en la prueba dice que no es necesario realmente envarlo

        return 'SMS notification sent';
    }
}
