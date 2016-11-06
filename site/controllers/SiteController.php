<?php
require 'stock/models/CajaModel.php';
require 'stock/models/SucursalModel.php';


class SiteController extends Controller
{
    const module='site';
    const vista='site';
    public function inicioAction()
    {
        $this->view->show('site','site/inicio', ['nombre'=>'hola mundo']);
    }
    public function listarsucursalesAction()
    {
        $model = new SucursalModel();
        $var = $model->listar();

        $model1 = new CajaModel();
        $var1 = $model1->listar();
        $this->view->show(self::module,self::vista.'/ingreso', [
            'sucursales'=>$var,
            'cajas'=>$var1
        ]);

    }
public function logoutAction()
{
    session_destroy();  header("location: login.php");

}

}