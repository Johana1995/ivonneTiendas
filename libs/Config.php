<?php

/**
 * Created by PhpStorm.
 * User: USUARIO
 * Date: 6/17/2016
 * Time: 23:29
 */
class Config
{
    private static $instance = null;
    private $vars;

    public function __construct()
    {
        $this->vars = [];
    }

    public static function singleton()
    {
        if(is_null(self::$instance))
            self::$instance = new Config();

        return self::$instance;
    }

    public function set($name, $value)
    {
        if(!isset($this->vars[$name]))
            $this->vars[$name] = $value;
    }

    public function get($name)
    {
        if(isset($this->vars[$name]))
            return $this->vars[$name];
    }
}
