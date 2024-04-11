<?php

namespace App\Dtos;

use App\Dtos\BaseDto;

class LogNotificationDto  extends BaseDto
{
    public $notification_id;
    public $user_id;
    public $channel_id;
    public $status;
    public $response;
}
