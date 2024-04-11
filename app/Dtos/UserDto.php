<?php

namespace App\Dtos;

use App\Dtos\BaseDto;

class UserDto  extends BaseDto
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $channels = [];
    public $categories = [];
}
