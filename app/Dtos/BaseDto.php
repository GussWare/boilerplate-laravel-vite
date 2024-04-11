<?php
namespace App\Dtos;

class BaseDto
{
    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function toArray()
    {
        return (array) $this;
    }
}
