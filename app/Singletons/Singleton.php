<?php

namespace App\Singletons;

class Singleton {

    private static $instances = [];

    protected function __construct() {}
    protected function __clone() {}

    public function __wakeup() {
        throw new \Exception("Cannot unserialize a Singleton");
    }

    public static function getInstance(): Singleton
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }
        return self::$instances[$cls];
    }
    
}