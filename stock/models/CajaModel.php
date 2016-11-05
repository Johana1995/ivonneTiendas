<?php

class CajaModel extends  Model
{
    public $id;
    public $numero;
    public $sucursal_id;
    public $montoinicial;
    public $empleado_id;
    const  table='caja';

    public function listar()
    {
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


}