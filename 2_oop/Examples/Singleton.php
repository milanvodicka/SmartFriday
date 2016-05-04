<?php

abstract class Singleton {

    /**
     * Instancia.
     * @var array
     */
    protected static $instances = [];

    /**
     * Vytvori / vrati instanciu.
     * @throws Exception
     * @return static
     */
    public static function getInstance() {
        $class = get_called_class();
        if (!array_key_exists($class, static::$instances)) {
            static::$instances[$class] = new static();
        }

        return static::$instances[$class];
    }

    protected function __construct() {
    }

    /**
     * Singleton nemoze byt klonovany.
     * @throws Exception
     */
    final private function __clone() {
        throw new Exception('Singleton sa nesmie klonovat!');
    }

    /**
     * Singleton nemoze byt deserializovany.
     * @throws Exception
     */
    final private function __wakeup() {
        throw new Exception('Singleton sa nesmie deserializovat!');
    }
}