<?php

namespace App\Services\Integrations;

use App\Interfaces\NotificationInterface;

class EmailNotificationService implements NotificationInterface
{
    public function send($user, $notification)
    {
        // Codigo para enviar el email, en la prueba dice que no es necesario realmente enviar el email.

        return 'Email notification sent';
    }
}
