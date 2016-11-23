<?php
use Entity\Rol;
require_once("../DALC/Database.php");
require_once("../Entity/Rol.php");

class RolRepository extends \Database
{
    public function findAllFilter($whereModel)
    {
        $whereString = $whereModel;        

        $this->connect();
        $proc = $this->conexion->prepare("EXEC GiftCard.RolGetAllFilter ? ");
        $proc->bindParam(1, $whereString, PDO::PARAM_STR);
        $proc->execute();
        $this->disconnect();
    
        while($res=$proc->fetch(PDO::FETCH_OBJ)){
            $entity = new Rol();
            $entity->setId($res->Id);
            $entity->setNombre($res->Nombre);
            $entity->setDescripcion($res->Descripcion);
            $entity->setEstado($res->Estado);
            
            $result[]= $entity;
        }
    
        return isset($result)? $result : array();
    }

    public function findById($id)
    {
        $this->connect();
        $proc = $this->conexion->prepare("EXEC GiftCard.RolGetById ? ");
        $proc->bindParam(1, $id, PDO::PARAM_INT);
        $proc->execute();
        $this->disconnect();
         
        $res=$proc->fetch(PDO::FETCH_OBJ);
        $entity = new Rol();
        $entity->setId($res->Id);
        $entity->setNombre($res->Nombre);
        $entity->setDescripcion($res->Descripcion);
        $entity->setEstado($res->Estado);

        return $entity;
    }
}
?>    