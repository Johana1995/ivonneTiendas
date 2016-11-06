<?php
class VentaModel extends Model
{
    public $id;
public $numero;
public $fechahora;
public $subtotal;
public $descuento;
public $iva;
public $totalrecibido;
public $totalcobrado;
public $totalcambio;
public $terminado;
public $cliente_id;
public $empleado_id;
public $caja_id;
public $sucursal_id;

    public function listar()
    {



            if(isset($_SESSION['sucursal_id']))
            {
                $sucursal=$_SESSION['sucursal_id'];}
            if(isset($_SESSION['caja_id']))
            {
                $sucursal=$_SESSION['caja_id'];}
            if (!empty($sucursal) and !empty($caja)) {

            $sucursal=$_SESSION['sucursal_id'];
            $caja=$_SESSION['caja_id'];
            $sql = 'SELECT v.id,v.numero ,v.fechahora,v.total,v.descuento,p.nombre,p.apellido FROM venta v,persona p,empleado e WHERE e.persona_id=p.id and e.id=v.empleado_id and sucursal_id='.$sucursal;
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        else
        {
            $sql = 'SELECT v.id,v.numero ,v.fechahora,v.total,v.descuento,p.nombre,p.apellido FROM venta v,persona p,empleado e WHERE e.persona_id=p.id and e.id=v.empleado_id';
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

    }

}