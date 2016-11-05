<?php
/**
 * Archivo de configuracion global
 */

// instanciamos la clase singleton
$config = Config::singleton();

// parametros de configuracion para el mvc
$config->set('controllers', 'controllers/');
$config->set('views', 'views/');
$config->set('models', 'models/');

// parametros de configuracion para la db
$config->set('dbhost', 'localhost');
$config->set('dbname', 'ivonne');
$config->set('dbuser', 'root');
$config->set('dbpass', '');