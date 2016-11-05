<?php
class SucursalModel extends Model
{
    public $id;
    public $nombre;
    public $direccion;
    public $numero;
   const  table='sucursal';

    public function listar()
    {
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


}