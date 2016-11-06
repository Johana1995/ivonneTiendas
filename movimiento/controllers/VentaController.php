<?php
require 'movimiento/models/VentaModel.php';

class VentaController extends Controller
{
    const model='venta';
    const module='movimiento';
    public function listarAction()
    {
        $model=new VentaModel();
        $var= $model->listar();
        $this->view->show(self::module,self::model.'/listar', [
            'ventas' => $var,
            'module'=>self::module,
            'controller'=>self::model
        ]);
    }
    public function crearAction()
    {

        $this->view->show('movimiento','venta/crear', [   ]);
    }
}