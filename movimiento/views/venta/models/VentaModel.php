<?php

class VentaModel extends Model
{
    public  $id;
    public $codigo;
    public $codigobarra;
    public $detalle;
    public $precioFabricaU;
    public $cantidadPackin;
    public $precioFabricaPack;//
    public $imagen;//url
    public $precioUnidadVenta;
    public $precioPackinVenta;
    public $depto_id;

    const  table='venta';

    public function listar()
    {
        $sql = 'SELECT * FROM listarventas';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function crear()
    {
        $sql = 'INSERT INTO '.self::table;
        $sql .= ' (codigo,codigobarra,detalle,precioFabricaU,cantidadPackin,precioFabricaPack,imagen,precioUnidadVenta,precioPackinVenta,depto_id)';
        $sql .= ' VALUES(?,?,?,?,?,?,?,?,?,?)';
        $params = [$this->codigo,$this->codigobarra,$this->detalle,$this->precioFabricaU,$this->cantidadPackin,$this->precioFabricaPack,
            $this->imagen,$this->precioUnidadVenta,$this->precioPackinVenta,$this->depto_id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return  $this->db->lastInsertId();
    }
    public function editar($id)
    {
        $sql = "SELECT * FROM ".self::table ." WHERE id=".$id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function actualizar()
    {
        $sql = 'UPDATE '.self::table.' SET ';
        $sql .= 'codigo=:codigo ,';
        $sql .= 'codigobarra=:codigobarra ,';
        $sql .= 'detalle=:detalle,';
        $sql .= 'precioFabricaU=:precioFabricaU,';
        $sql .= 'cantidadPackin=:cantidadPackin,';
        $sql .= 'precioFabricaPack=:precioFabricaPack,';
        $sql .= 'imagen=:imagen,';
        $sql .= 'precioUnidadVenta=:precioUnidadVenta,';
        $sql .= 'precioPackinVenta=:precioPackinVenta,';
        $sql .= 'depto_id=:depto_id' ;
        $sql .= ' WHERE id=:id';
        $params = [
            'codigo' => $this->codigo,
            'codigobarra' => $this->codigobarra ,
            'detalle' =>$this->detalle,
            'precioFabricaU'=>$this->precioFabricaU,
            'cantidadPackin'=>$this->cantidadPackin,
            'precioFabricaPack'=>$this->precioFabricaPack,
            'imagen'=>$this->imagen,
            'precioUnidadVenta'=>$this->precioUnidadVenta,
            'precioPackinVenta'=>$this->precioPackinVenta,
            'depto_id'=>$this->depto_id,
            'id' => $this->id,
        ];
        $query = $this->db->prepare($sql);
        $query->execute($params);
    }
    public function eliminar($id)
    {
        $this->db->prepare('DELETE FROM '.self::table .' WHERE id='.$id)->execute();
    }

}