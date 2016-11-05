<?php
require 'seguridad/models/EmpleadocargoModel.php';

class EmpleadocargoController extends Controller
{
    const table='empleadocargo';
    public function listarAction()
    {
        $model = new EmpleadocargoModel();
        $cuaccion = $model->listar();
        // mostramos la vista
        $this->view->show('seguridad',self::table.'/listar', [
            'ce' => $cuaccion,
        ]);
    }
    public function crearAction()
    {
        // 2.- recuperamos los datos introducidos por el formulario
        if (!empty($_POST)) {

            $model = new EmpleadocargoModel();

            $model->empleado_id = $_POST['select-empleado'];
            $model->cargo_id = $_POST['select-cargo'];
            header('Location: index.php?module=seguridad&controller=' . self::table . '&action=listar');
        }
        $this->view->show(self::table.'/crear',[
            'cargos' => $this->listacargos(),
            'empleados'=>$this->listaempleados(),
        ]);
    }
    private function listacargos()
    {
        $model = new EmpleadocargoModel();
        $cus = $model->listarCargos();
        return $cus;
    }
    private function listaempleados()
    {
        $model = new EmpleadocargoModel();
        $acciones = $model->listarEmpleados();
        return $acciones;
    }
    public function eliminarAction()
    {
        if(!empty($_GET['id'])){
            $model = new CuaccionModel();
            $model->eliminar($_GET['id']);

            header('Location: index.php?module=seguridad&controller='.self::table.'&action=listar');
        }
    }

}