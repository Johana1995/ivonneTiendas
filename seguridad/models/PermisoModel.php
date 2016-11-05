<?php

/**
 * Created by PhpStorm.
 * User: PX
 * Date: 24/09/2016
 * Time: 23:28
 */
class PermisoModel extends  Model
{
    public $cuaccion_id;
    public $id;
    public $rol_id;

    const table='permisos';

    public function listar()
    {
        $sql = 'SELECT * FROM listarPermisos';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function listarCuaccion()
    {
        $sql = 'SELECT * FROM listarCuaccion';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function listarRoles()
    {
        $sql = 'SELECT * FROM listarRoles';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function crear()
    {
        $sql = 'INSERT INTO '.self::table;
        $sql .= ' (cuaccion_id,rol_id)';
        $sql .= ' VALUES(?,?)';

        $params = [$this->cuaccion_id,$this->rol_id];

        $query = $this->db->prepare($sql);

        $query->execute($params);

    }

    public function buscar()
    {
        $sql = "SELECT COUNT(*) as count FROM ".self::table ." WHERE cuaccion_id=".$this->cuaccion_id." AND rol_id=".$this->rol_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        $numCol=$query->fetchColumn();
        if($numCol>0)
            return 1;
        else
            return 0;
    }


    public function eliminar($id)
    {
        $this->db->prepare('DELETE FROM '.self::table .' WHERE id='.$id)->execute();
    }

}