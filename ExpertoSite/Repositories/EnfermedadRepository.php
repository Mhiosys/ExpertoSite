<?php
use Entity\Enfermedad;
require_once("../DALC/Database.php");
require_once("../Entity/Enfermedad.php");

class EnfermedadRepository extends \Database
{
    public function findAllFilter($whereModel, $start, $length, $order, $columnsModel)
    {        
        $orderString = '';
        $whereString = $whereModel;
        if(isset($order) && count($order)) {
            $orderBy = array();

            $columns = array(
            array('db' => 'Id'),
            array('db' => 'Nombre'),
            array('db' => 'Descripcion'),
            array('db' => 'Estado')
            );

            $dtColumns = ['Id', 'Nombre', 'Descripcion', 'Estado'];

            for ( $i=0, $ien=count($order) ; $i<$ien ; $i++ ) {
                $columnIdx = intval($order[$i]['column']);
                $requestColumn = $columnsModel[$columnIdx];
                $columnIdx = array_search( $requestColumn['data'], $dtColumns );
                $column = $columns[$columnIdx];
              
                if ( $requestColumn['orderable'] == 'true' ) {
                    $dir = $order[$i]['dir'] === 'asc' ? 'ASC' :'DESC';
                    $orderBy[] = '['.$column['db'].'] '.$dir;
                }
            }
            $orderString =  " ".implode(', ', $orderBy)." ";
        }

        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.EnfermedadGetAllFilter ?,?,?,? ");
        $proc->bindParam(1, $whereString, PDO::PARAM_STR);
        $proc->bindParam(2, $orderString, PDO::PARAM_STR);
        $proc->bindParam(3, intval($start), PDO::PARAM_INT);
        $proc->bindParam(4, intval($length), PDO::PARAM_INT);
        $proc->execute();
        $this->disconnect();
    
        while($res=$proc->fetch(PDO::FETCH_OBJ)){
            $entity = new Enfermedad();
            $entity->setId($res->Id);
            $entity->setNombre($res->Nombre);
            $entity->setDescripcion($res->Descripcion);
            $entity->setEstado($res->Estado);
            $entity->setCantidad($res->Cantidad);
            
            $result[]= $entity;
        }
    
        return isset($result)? $result : array();
    }

    public function findAll($whereModel)
    {
        $whereString = $whereModel;        

        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.EnfermedadGetAll ? ");
        $proc->bindParam(1, $whereString, PDO::PARAM_STR);
        $proc->execute();
        $this->disconnect();
    
        while($res=$proc->fetch(PDO::FETCH_OBJ)){
            $entity = new Enfermedad();
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
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.EnfermedadGetById ? ");
        $proc->bindParam(1, $id, PDO::PARAM_INT);
        $proc->execute();
        $this->disconnect();
         
        $res=$proc->fetch(PDO::FETCH_OBJ);
        $entity = new Enfermedad();
        $entity->setId($res->Id);
        $entity->setNombre($res->Nombre);
        $entity->setDescripcion($res->Descripcion);
        $entity->setEstado($res->Estado);

        return $entity;
    }     

    public function add($entity)
    {        
        $nombre = $entity->getNombre();
        $descripcion = $entity->getDescripcion();
        $estado = $entity->getEstado();
        $usuarioCreacion = $entity->getUsuarioCreacion();

        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.EnfermedadInsert ?,?,?,? ");
        $proc->bindParam(1, $nombre, PDO::PARAM_STR);
        $proc->bindParam(2, $descripcion, PDO::PARAM_STR);
        $proc->bindParam(3, intval($estado), PDO::PARAM_INT);
        $proc->bindParam(4, $usuarioCreacion, PDO::PARAM_STR);
        $proc->execute();
        $this->disconnect();

        $res=$proc->fetch(PDO::FETCH_OBJ);
        return $res->Id;
    }   

    public function edit($entity)
    {        
        $nombre = $entity->getNombre();
        $descripcion = $entity->getDescripcion();
        $estado = $entity->getEstado();
        $usuarioModificacion = $entity->getUsuarioModificacion();
        $id = $entity->getId();

        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.EnfermedadUpdate ?,?,?,?,? ");
        $proc->bindParam(1, $nombre, PDO::PARAM_STR);
        $proc->bindParam(2, $descripcion, PDO::PARAM_STR);
        $proc->bindParam(3, intval($estado), PDO::PARAM_INT);
        $proc->bindParam(4, $usuarioModificacion, PDO::PARAM_STR);
        $proc->bindParam(5, intval($id), PDO::PARAM_INT);
        $proc->execute();
        $this->disconnect();

        $res=$proc->fetch(PDO::FETCH_OBJ);
        return $res->Id;        
    }     

    public function delete($entity)
    {
        $id = $entity->getId();

        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.EnfermedadDelete ? ");
        $proc->bindParam(1, intval($id), PDO::PARAM_INT);
        $proc->execute();
        $this->disconnect();

        $res=$proc->fetch(PDO::FETCH_OBJ);
        return $res->Id;        
    }     
}
?>    