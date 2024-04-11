<?php
namespace App\Libraries;

class DictionaryLibrary
{
    private $items = [];

    public function addItem($key, $value)
    {
        $this->items[$key] = $value;
    }

    public function getItem($key)
    {
        return isset($this->items[$key]) ? $this->items[$key] : null;
    }

    public function removeItem($key)
    {
        unset($this->items[$key]);
    }
}