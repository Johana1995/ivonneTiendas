<?php

/**
 * Created by PhpStorm.
 * User: johana
 * Date: 28/10/2016
 * Time: 12:04 AM
 */
class EmpleadocargoModel extends Model
{
    public  $empleado_id;
    public  $cargo_id;

    const table='cargo_empleado';

    public function listar()
    {
        $sql = 'SELECT * FROM listarCargosEmpleados';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function listarEmpleados()
    {
        $sql = 'SELECT * FROM listarEmpleados';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function listarCargos()
    {
        $sql = 'SELECT * FROM cargo';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function crear()
    {

        $sql = 'INSERT INTO '.self::table;
        $sql .= ' (empleado_id,cargo_id)';
        $sql .= ' VALUES(?,?)';
        $params = [$this->empleado_id,$this->cargo_id];
        $query = $this->db->prepare($sql);
        $query->execute($params);

    }

    public function eliminar($empleado_id,$cargo_id)
    {
        $this->db->prepare('DELETE FROM '.self::table .' WHERE empleado_id='.$empleado_id.' and cargo_id='.$cargo_id)->execute();
    }


}