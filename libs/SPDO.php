<?php

class SPDO extends PDO
{
    private static $instance = null;

    public function __construct()
    {
        // instanciamos la clase singleton de configuraciones
        $config = Config::singleton();

        // llamamos al contructor padre
        parent::__construct(
            'mysql:host=' . $config->get('dbhost') . ';dbname=' . $config->get('dbname'),
            $config->get('dbuser'),
            $config->get('dbpass')
        );
    }

    public static function singleton()
    {
        if(is_null(self::$instance))
            self::$instance = new SPDO();

        return self::$instance;
    }
}