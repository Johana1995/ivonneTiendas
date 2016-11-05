<?php
require 'models/PermisoModel.php';

/**
 * Created by PhpStorm.
 * User: PX
 * Date: 24/09/2016
 * Time: 23:42
 */
class PermisoController extends  Controller
{
    const table='permiso';
    public function listarAction()
    {

        $model = new PermisoModel();
        $permisos = $model->listar();

        $this->view->show(self::table.'/listar', [
            'permisos' => $permisos,
        ]);
    }
    public function crearAction()
    {
        // 2.- recuperamos los datos introducidos por el formulario
        if (!empty($_POST)) {
            $model = new PermisoModel();
            $model->cuaccion_id = $_POST['select-cuaccion'];
            $model->rol_id = $_POST['select-rol'];
            if($model->buscar()==0)
            $model->crear();

            header('Location: index.php?controller='.self::table.'&action=listar');
        }

        // 1.- presentamos el formulario para llenar los datos al cliente
        $this->view->show(self::table.'/crear',[
            'cuas'=>$this->listaCuaccion(),
            'roles'=>$this->listaRoles(),
            ]);
    }
    public function listaCuaccion()
    {
        $model = new PermisoModel();
        $result=$model->listarCuaccion();
        $model=null;
        return  $result;
    }
    public function listaRoles()
    {
        $model = new PermisoModel();
        $result=$model->listarRoles();
        $model=null;
        return  $result;
    }
    public function eliminarAction()
    {
        if(!empty($_GET['id'])){

            $model = new AccionModel();
            $model->eliminar($_GET['id']);

            header('Location: index.php?controller='.self::table.'&action=listar');
        }
    }
}