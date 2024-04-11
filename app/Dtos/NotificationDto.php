<?php 
namespace App\Dtos;

use App\Dtos\BaseDto;

class NotificationDto  extends BaseDto{
    public $title;
    public $message;
    public $category_id;
}