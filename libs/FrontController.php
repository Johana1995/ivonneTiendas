<?php
class FrontController
{
    public static function main()
    {

        // 1.- incluir las clases de la libreria
        require 'libs/Config.php'; // clase singleton para datos de configuracion
        require 'libs/View.php'; // clase generadora de plantillas para la vista
        require 'libs/SPDO.php'; // clase singleton de conexion unica a la db
        require 'libs/Controller.php'; // clase padre para controladores
        require 'libs/Model.php'; // clase padre para modelos
        // 2.- incluir el fichero o archivo de configuracion
        require __DIR__.'/../config.php';
        //2.1.- recuperar el modulo requerido
        if (!empty($_GET['module']))
            $moduleName = $_GET['module'].'/';
        else
            $moduleName = 'site/';

        // 3.- recuperar el controlador requerido por el cliente,
        //      de lo contrario definir uno por defecto
        if (!empty($_GET['controller']))
            $controllerName = $_GET['controller'] . 'Controller';
        else
            $controllerName = 'SiteController';

        // 4.- recuperar la action requerida por el cliente,
        //      de lo contrario definir uno por defecto
        if (!empty($_GET['action']))
            $actionName = $_GET['action'] . 'Action';
        else
            $actionName = 'inicioAction';

        // 5.- armar la ruta del modulo y verificar si existe,
        //      de lo contrario terminar la aplicacion
        $controllerPath = $moduleName.$config->get('controllers') . $controllerName.'.php' ;

        if (file_exists($controllerPath))
            require $controllerPath;
        else
            die('El controlador no existe. Error 404 - not found');


        // 6.- verificar si existe la accion requerida,
        //      de lo contrario lanzar un mensaje de error
        if (!is_callable([$controllerName, $actionName])) {
            trigger_error($moduleName.'->'.$controllerName.'->'.$actionName.' no existe', E_USER_NOTICE);
            return false;
        }
        // 7.- si tod esta bien lanzar la accion
        $controller = new $controllerName();
        $controller->$actionName();
    }
}