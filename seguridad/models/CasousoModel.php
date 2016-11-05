<?php

/**
 * Created by PhpStorm.
 * User: PX
 * Date: 24/09/2016
 * Time: 17:01
 */
class CasousoModel extends Model
{
    public $id;
    public $nombre;
    const table='casouso';
    public function listar()
    {
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function crear()
    {
        $sql = 'INSERT INTO '.self::table;
        $sql .= ' (nombre)';
        $sql .= ' VALUES(?)';

        $params = [$this->nombre];

        $query = $this->db->prepare($sql);

        $query->execute($params);

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
        $sql .= 'nombre=:nombre';
        $sql .= ' WHERE id=:id';

        $params = [
            'id' => $this->id,
            'nombre' => $this->nombre,
        ];

        $query = $this->db->prepare($sql);

        $query->execute($params);
    }
    public function eliminar($id)
    {
        $this->db->prepare('DELETE FROM '.self::table .' WHERE id='.$id)->execute();
    }
}