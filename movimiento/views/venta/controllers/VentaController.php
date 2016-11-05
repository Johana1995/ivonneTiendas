<?php
require 'movimiento/models/VentaModel.php';
require 'stock/models/ProductoModel.php';

class VentaController extends Controller
{
    const model='venta';
    const module='movimiento';
    public function listarAction()
    {
        $model = new VentaModel();
        $var= $model->listar();
        $this->view->show(self::module,self::model.'/listar', [
            'ventas' => $var,
            'module'=>self::module,
            'controller'=>self::model
        ]);
    }

    public function crearAction()
    {

        $this->view->show(self::module,self::model.'/crear',[
                'module'=>self::module,
                'controller'=>self::model,
                'productos'=>$this->listarProductos()
            ]
        );
    }
    public function listarProductos()
    {
        $model = new ProductoModel();
        $var= $model->listar();
        return $var;
    }

}