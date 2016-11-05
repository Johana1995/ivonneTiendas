<?php

/**
 * Created by PhpStorm.
 * User: PX
 * Date: 24/09/2016
 * Time: 17:57
 */
class CuaccionModel extends Model
{
    public $accion_id;
    public $casouso_id;
    public $id;
    const table='cuaccion';

    public function listar()
    {
        $sql = 'SELECT * FROM listarCuaccion';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscar()
    {
        $sql = "SELECT COUNT(*) FROM ".self::table ." WHERE casouso_id=".$this->casouso_id." AND accion_id=".$this->accion_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        $numCol=$query->fetchColumn();
        if($numCol>0)
            return 1;
        else
            return 0;
    }
    public function crear()
    {

        $sql = 'INSERT INTO '.self::table;
        $sql .= ' (accion_id,casouso_id)';
        $sql .= ' VALUES(?,?)';
        $params = [$this->accion_id,$this->casouso_id];
        $query = $this->db->prepare($sql);
        $query->execute($params);

    }

    public function eliminar($id)
    {
        $this->db->prepare('DELETE FROM '.self::table .' WHERE id='.$id)->execute();
    }
}