<?php

class VentaController extends Controller
{
    public function crearAction()
    {

        $this->view->show('movimiento','venta/nueva_factura', [   ]);
    }
}