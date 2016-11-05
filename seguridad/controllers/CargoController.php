<?php
require 'seguridad/models/CargoModel.php';

class CargoController extends  Controller
{
    public function listarAction()
    {
        // recuperar los usuarios a traves del modelo
        $model = new CargoModel();
        $rols = $model->listar();

        // mostramos la vista
        $this->view->show('seguridad','cargo/listar', [
            'rols' => $rols,
        ]);
    }

    public function crearAction()
    {
        // 2.- recuperamos los datos introducidos por el formulario
        if (!empty($_POST)) {
            $model = new CargoModel();
            $model->nombre = $_POST['nombre'];
            $model->descripcion = $_POST['descripcion'];
            $model->crear();
            header('Location: index.php?module=seguridad&controller=rol&action=listar');
        }

        // 1.- presentamos el formulario para llenar los datos al cliente
        $this->view->show('seguridad','rol/crear');
    }

    public function editarAction()
    {
        // 2.- recuperar los datos editados del formulario para actualizar la db
        if (!empty($_POST['update'])) {
            $model = new CargoModel();

            $model->id = $_POST['id'];
            $model->nombre = $_POST['nombre'];
            $model->descripcion = $_POST['descripcion'];
            $model->actualizar();

            header('Location: index.php?module=seguridad&controller=rol&action=listar');
        }

        // 1.- recuperar el id del usuario requerido por el cliente para ser editado
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $model = new CargoModel();
            $rol = $model->editar($id);
            $this->view->show('seguridad','rol/editar', [
                'rol' => $rol
            ]);
        }

    }

    public function eliminarAction()
    {
        if(!empty($_GET['id'])){

            $model = new CargoModel();
            $model->eliminar($_GET['id']);

            header('Location: login.php?module=seguridad&controller=rol&action=listar');
        }
    }
}