<?php

class ClienteModel extends  Model
{public $persona_id;
    public $id;
    public $apellido;
    public $nombre;
    public $nacimiento;
    public $genero_id;
    public $telefono_id;
    public $numero;
    //datos del empleado
    public $nit;
    const table='cliente';
    public function listar()
    {
        $sql = 'SELECT * FROM listarclientes';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function crear()
    {
        $sql3 = 'INSERT INTO telefono';
        $sql3 .= ' (numero)';
        $sql3 .= ' VALUES(?)';
        $params3 = [$this->telefono_id];
        $query3 = $this->db->prepare($sql3);
        $query3->execute($params3);
        $ultimoIdtelef=  $this->db->lastInsertId();

        $sql = 'INSERT INTO persona';
        $sql .= ' (apellido,nombre,direccion,nacimiento,genero_id,telefono_id)';
        $sql .= ' VALUES(?,?,?,?,?,?)';
        $params = [$this->apellido,$this->nombre,$this->direccion,$this->nacimiento,$this->genero_id,$ultimoIdtelef];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $ultimoIdPersona=  $this->db->lastInsertId();

        $sql2 = 'INSERT INTO empleado';
        $sql2 .= ' (persona_id,correo,username,password)';
        $sql2 .= ' VALUES(?,?,?,?)';
        $params2 = [$ultimoIdPersona,$this->correo,$this->username,$this->password];
        $query2 = $this->db->prepare($sql2);
        $query2->execute($params2);
    }
    public function editar($id,$persona_id)
    {
        $sql = "SELECT t.numero as telefono,e.id,e.persona_id,p.apellido,p.nombre,p.direccion,p.nacimiento,p.genero_id,p.telefono_id,e.username,e.password,e.correo
                FROM empleado e, persona p,telefono t WHERE e.id=".$id." and p.id=".$persona_id." and t.id=p.telefono_id";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function actualizar()
    {
        $sql1 = 'UPDATE telefono SET ';
        $sql1 .= 'numero=:numero';
        $sql1 .= ' WHERE id=:id';
        $params1 = [
            'id' => $this->telefono_id,
            'numero' => $this->numero,
        ];
        $query1 = $this->db->prepare($sql1);
        $query1->execute($params1);

        $sql = 'UPDATE persona SET ';
        $sql .= 'nombre=:nombre,';
        $sql .= 'apellido=:apellido,';
        $sql .= 'direccion=:direccion,';
        $sql .= 'nacimiento=:nacimiento,';
        $sql .= 'genero_id=:genero_id,';
        $sql .= 'telefono_id=:telefono_id';
        $sql .= ' WHERE id=:id';

        $params = [
            'id' => $this->persona_id,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'direccion' => $this->direccion,
            'nacimiento' => $this->nacimiento,
            'genero_id' => $this->genero_id,
            'telefono_id' => $this->telefono_id,
        ];
        $query = $this->db->prepare($sql);
        $query->execute($params);

        $sql2 = 'UPDATE empleado SET ';
        $sql2 .= 'correo=:correo,';
        $sql2 .= 'username=:username,';
        $sql2 .= 'password=:password';
        $sql2 .= ' WHERE id=:id ';
        $params2 = [
            'id' => $this->id,
            'correo' => $this->correo,
            'username' => $this->username,
            'password' => $this->password,
        ];
        $query2 = $this->db->prepare($sql2);
        $query2->execute($params2);
    }
    public function  listarGeneros()
    {
        $sql = 'SELECT * FROM genero ';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function eliminar($id,$persona_id,$telefono_id)
    {
        $this->db->prepare('DELETE FROM empleado WHERE id='.$id)->execute();
        $this->db->prepare('DELETE FROM persona WHERE id='.$persona_id)->execute();
        $this->db->prepare('DELETE FROM telefono WHERE id='.$telefono_id)->execute();

    }


}