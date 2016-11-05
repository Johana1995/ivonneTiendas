<?php
require 'stock/models/ProductoModel.php';

class ProductoController extends Controller
{
    const model='producto';
    const module='stock';
    public function listarAction()
    {
        $model = new ProductoModel();
        $var= $model->listar();
        $this->view->show(self::module,self::model.'/listar', [
            'productos' => $var,
            'module'=>self::module,
            'controller'=>self::model
        ]);
    }
    public function listarimagenesAction()
    {
        $model = new ProductoModel();
        $var= $model->listarimagenes();
        $this->view->show(self::module,self::model.'/images', [
            'productos' => $var,
            'module'=>self::module,
            'controller'=>self::model
        ]);
    }
    public function crearAction()
    {
        if (!empty($_POST)) {
            $model = new ProductoModel();
            $model->codigo =$_POST['codigo'];
            $model->codigobarra =$_POST['codigobarra'];
            $model->detalle =$_POST['detalle'];
            $model->precioFabricaU = $_POST['precioFabricaU'];
            $model->cantidadPackin = $_POST['cantidadPackin'];
            $model->precioFabricaPack=$_POST['precioFabricaPack'];
            $model->precioUnidadVenta = $_POST['precioUnidadVenta'];
            $model->precioPackinVenta = $_POST['precioPackinVenta'];
            $model->imagen='imagendir';
            $model->depto_id = $_POST['depto_id'];
            $id=$model->crear();
            header('Location: index.php?module='.self::module.'&controller='.self::model.'&action=listar&id='.$id);
        }

        $this->view->show(self::module,self::model.'/crear',[
                'deptos'=>$this->listarDeptos(),
                'module'=>self::module,
                'controller'=>self::model
            ]
        );
    }
    public function editarAction()
    {
        if (!empty($_POST['update'])) {
            $model = new ProductoModel();
            $model->id=$_POST['id'];
            $model->codigo = $_POST['codigo'];
            $model->codigobarra = $_POST['codigobarra'];
            $model->detalle = $_POST['detalle'];
            $model->precioFabricaU = $_POST['precioFabricaU'];
            $model->cantidadPackin = $_POST['cantidadPackin'];
            $model->precioFabricaPack=$_POST['precioFabricaPack'];
            $model->precioUnidadVenta = $_POST['precioUnidadVenta'];
            $model->precioPackinVenta = $_POST['precioPackinVenta'];
            $model->imagen='imagendir';
            $model->depto_id = $_POST['depto_id'];
            $model->actualizar();
            header('Location: index.php?module='.self::module.'&controller='.self::model.'&action=listar');
        }
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $model = new ProductoModel();
            $var = $model->editar($id);
            $this->view->show(self::module,self::model.'/editar',
                ['producto' => $var,'module'=>self::module,'controller'=>self::model]);
        }
    }
    public function eliminarAction()
    {
        if(!empty($_GET['id'])){
            $model = new ProductoModel();
            $model->eliminar($_GET['id']);
            header('Location: index.php?module='.self::module.'&controller='.self::model.'&action=listar');
        }
    }
    public function listarDeptos()
    {
        $model = new ProductoModel();
        $var = $model->listarDeptos();
        return $var;
    }
}
