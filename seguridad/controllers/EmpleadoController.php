<?php
require 'seguridad/models/EmpleadoModel.php';

class EmpleadoController extends  Controller
{
    const module='seguridad';
    const vista='empleado';
    public function listarAction()
    {
        // recuperar los usuarios a traves del modelo
        $model = new EmpleadoModel();
        $empleados = $model->listar();
        // mostramos la vista
        $this->view->show(self::module,self::vista.'/listar', [
            'empleados'=>$empleados,
            'module'=>self::module,
            'controller'=>self::vista
        ]);
    }
    public function crearAction()
    {
        if (!empty($_POST)) {
            $model = new EmpleadoModel();
            $model->nombre = $_POST['nombre'];
            $model->apellido = $_POST['apellido'];
            $model->direccion = $_POST['direccion'];
            $model->nacimiento = $_POST['nacimiento'];
            $model->genero_id = $_POST['select-genero'];
            $model->telefono_id = $_POST['telefono_id'];//
            //empleado
            $model->correo = $_POST['correo'];
            $model->username = $_POST['username'];
            $model->password = $_POST['password'];
            $model->crear();
            header('Location: index.php?module='.self::module.'&controller='.self::vista.'&action=listar');
        }
        $this->view->show(self::module,self::vista.'/crear',[
            'generos'=>$this->listarGeneros(),
            'module'=>self::module,
            'controller'=>self::vista
        ]);
    }

    public function listarGeneros()
    {
        $model = new EmpleadoModel();
        $generos = $model->listarGeneros();
        return $generos;

    }

    public function editarAction()
    {
        // 2.- recuperar los datos editados del formulario para actualizar la db
        if (!empty($_POST['update'])) {
            $model = new EmpleadoModel();
            $model->persona_id=$_POST['persona_id'];
            $model->id=$_POST['id'];
            $model->nombre = $_POST['nombre'];
            $model->apellido = $_POST['apellido'];
            $model->direccion = $_POST['direccion'];
            $model->nacimiento = $_POST['nacimiento'];
            $model->genero_id = $_POST['select-genero'];
            $model->telefono_id = $_POST['telefono_id'];
            $model->numero = $_POST['telefono'];//
            $model->correo = $_POST['correo'];
            $model->username = $_POST['username'];
            $model->password = $_POST['password'];
            $model->actualizar();
            header('Location: index.php?module=seguridad&controller=empleado&action=listar');
        }
        if (!empty($_GET['id'])&& !empty($_GET['persona_id'])) {
            $id = $_GET['id'];
            $persona_id = $_GET['persona_id'];
            $model = new EmpleadoModel();
            $empleado = $model->editar($id,$persona_id);

            $this->view->show('seguridad','empleado/editar', [
                'var' => $empleado,
                'generos'=>$this->listarGeneros(),
                'module'=>self::module,
                'controller'=>self::vista
            ]);
        }

    }

    public function eliminarAction()
    {
        if(!empty($_GET['id'])&& !empty($_GET['persona_id'])){

            $model = new EmpleadoModel();
            $model->eliminar($_GET['id'],$_GET['persona_id'],$_GET['telefono_id']);
            header('Location:index.php?module='.self::module.'&controller='.self::vista.'&action=listar');
        }
    }
}