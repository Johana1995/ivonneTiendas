<?php
require 'models/CuaccionModel.php';
require 'models/CasousoModel.php';
require 'models/AccionModel.php';
/**
 * Created by PhpStorm.
 * User: PX
 * Date: 24/09/2016
 * Time: 20:56
 */
class CuaccionController  extends  Controller
{
    const table='cuaccion';
    public function listarAction()
    {
        // recuperar los usuarios a traves del modelo
        $model = new CuaccionModel();
        $cuaccion = $model->listar();
        // mostramos la vista
        $this->view->show(self::table.'/listar', [
            'cuacciones' => $cuaccion,
        ]);
    }
    public function crearAction()
    {
        // 2.- recuperamos los datos introducidos por el formulario
        if (!empty($_POST)) {

            $model = new CuaccionModel();

                $model->casouso_id = $_POST['select-cu'];
                $model->accion_id = $_POST['select-accion'];
                 if($model->buscar()==0)
                 {
                     $model->crear();
                 }
                header('Location: index.php?controller=' . self::table . '&action=listar');

        }

        // 1.- presentamos el formulario para llenar los datos al cliente
        $this->view->show(self::table.'/crear',[
            'cus' => $this->listaCu(),
            'acciones'=>$this->listaAccion(),
        ]);
    }
    private function listaCu()
    {
        $model = new CasousoModel();
        $cus = $model->listar();
        return $cus;
    }
    private function listaAccion()
    {
        $model = new AccionModel();
        $acciones = $model->listar();
        return $acciones;
    }
    public function eliminarAction()
    {
        if(!empty($_GET['id'])){
            $model = new CuaccionModel();
            $model->eliminar($_GET['id']);

            header('Location: index.php?controller='.self::table.'&action=listar');
        }
    }

}