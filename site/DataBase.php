<?php

class DataBase extends PDO
{

    private static $instance = null;
    private static $db = [
                    'dbhost'=>'localhost',
                    'dbname'=>'ivonne',
                    'dbuser'=> 'root',
                    'dbpass' => '',
                    ];
    public function __construct()
    {
        // llamamos al contructor padre
        parent::__construct(
            'mysql:host=' .self::$db['dbhost'] . ';dbname=' . self::$db['dbname'],
            self::$db['dbuser'],
            self::$db['dbpass']
        );
    }

    public static function singleton()
    {
        if(is_null(self::$instance))
            self::$instance = new DataBase();

        return self::$instance;
    }
}




