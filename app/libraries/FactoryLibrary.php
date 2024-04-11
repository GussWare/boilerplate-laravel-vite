<?php 

namespace App\Libraries;

class FactoryLibrary {

    public function __construct()
    {

    }

    public function create($path) {
        if ($path) {
            return app($path);
        } else {
            throw new \Exception("Class $path does not exist.");
        }
    }
}