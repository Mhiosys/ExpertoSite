<?php
use Entity\Sintoma;
require_once("../DALC/Database.php");
require_once("../Entity/Sintoma.php");

class SintomaRepository extends \Database
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
            array('db' => 'Pregunta'),
            array('db' => 'Enfermedad'),
            array('db' => 'Estado')
            );

            $dtColumns = ['Id', 'Nombre', 'Pregunta', 'Enfermedad','Estado'];

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
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.SintomaGetAllFilter ?,?,?,? ");
        $proc->bindParam(1, $whereString, PDO::PARAM_STR);
        $proc->bindParam(2, $orderString, PDO::PARAM_STR);
        $proc->bindParam(3, intval($start), PDO::PARAM_INT);
        $proc->bindParam(4, intval($length), PDO::PARAM_INT);
        $proc->execute();
        $this->disconnect();
    
        while($res=$proc->fetch(PDO::FETCH_OBJ)){
            $entity = new Sintoma();
            $entity->setId($res->Id);            
            $entity->setNombre($res->Nombre);
            $entity->setPregunta($res->Pregunta);
            $entity->setEstado($res->Estado);
            $entity->setEnfermedadId($res->EnfermedadId);
            $entity->setEsPrincipal($res->EsPrincipal);
            $entity->setEnfermedadNombre($res->EnfermedadNombre);
            $entity->setCantidad($res->Cantidad);
            
            $result[]= $entity;
        }
    
        return isset($result)? $result : array();
    }

    public function findAll($whereModel)
    {
        $whereString = $whereModel;        

        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.SintomaGetAll ? ");
        $proc->bindParam(1, $whereString, PDO::PARAM_STR);
        $proc->execute();
        $this->disconnect();
    
        while($res=$proc->fetch(PDO::FETCH_OBJ)){
            $entity = new Sintoma();
            $entity->setId($res->Id);
            $entity->setEnfermedadId($res->EnfermedadId);
            $entity->setEsPrincipal($res->EsPrincipal);
            $entity->setNombre($res->Nombre);
            $entity->setPregunta($res->Pregunta);
            $entity->setEstado($res->Estado);
            
            $result[]= $entity;
        }
    
        return isset($result)? $result : array();
    } 

    public function findAllByEnfermedad($enfermedadId)
    {     
        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.SintomaGetAllByEnfermedad ? ");
        $proc->bindParam(1, $enfermedadId, PDO::PARAM_INT);
        $proc->execute();
        $this->disconnect();
    
        while($res=$proc->fetch(PDO::FETCH_OBJ)){
            $entity = new Sintoma();
            $entity->setId($res->Id);
            $entity->setNombre($res->Nombre);
            $entity->setPregunta($res->Pregunta);
            $entity->setEsPrincipal($res->EsPrincipal);
            $entity->setEstado($res->Estado);
            
            $result[]= $entity;
        }
    
        return isset($result)? $result : array();
    }        

    public function findById($id)
    {
        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.SintomaGetById ? ");
        $proc->bindParam(1, $id, PDO::PARAM_INT);
        $proc->execute();
        $this->disconnect();
         
        $res=$proc->fetch(PDO::FETCH_OBJ);
        $entity = new Sintoma();
        $entity->setId($res->Id);
        $entity->setEnfermedadId($res->EnfermedadId);
        $entity->setEsPrincipal($res->EsPrincipal);
        $entity->setNombre($res->Nombre);
        $entity->setPregunta($res->Pregunta);
        $entity->setEstado($res->Estado);

        return $entity;
    }

    public function findFirstPrincipal()
    {
        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.SintomaGetFirstPrincipal ");
        $proc->execute();
        $this->disconnect();
         
        $res=$proc->fetch(PDO::FETCH_OBJ);
        $entity = new Sintoma();
        $entity->setId($res->Id);
        $entity->setNombre($res->Nombre);
        $entity->setPregunta($res->Pregunta);
        $entity->setEsPrincipal($res->EsPrincipal);                
        $entity->setEstado($res->Estado);        
        $entity->setEnfermedadId($res->EnfermedadId);
        $entity->setEnfermedadNombre($res->EnfermedadNombre);

        return $entity;
    }

    public function findNext($enfermedadId, $next)
    {
        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.SintomaGetNext ?,? ");
        $proc->bindParam(1, intval($enfermedadId), PDO::PARAM_INT);
        $proc->bindParam(2, intval($next), PDO::PARAM_INT);
        $proc->execute();
        $this->disconnect();

        $res=$proc->fetch(PDO::FETCH_OBJ);

        if($res!=null)
        {
            $entity = new Sintoma();
            $entity->setId($res->Id);
            $entity->setNombre($res->Nombre);
            $entity->setPregunta($res->Pregunta);
            $entity->setEsPrincipal($res->EsPrincipal);                
            $entity->setEstado($res->Estado);        
            $entity->setEnfermedadId($res->EnfermedadId);    
            $entity->setEnfermedadNombre($res->EnfermedadNombre);    

            return $entity;  
        }else
        {
            return null;
        }      
    }  

    public function findNextPrincipalByEnfermedadId($enfermedadId)
    {
        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.SintomaGetNextPrincipalByEnfermedadId ? ");
        $proc->bindParam(1, intval($enfermedadId), PDO::PARAM_INT);
        $proc->execute();
        $this->disconnect();

        $res=$proc->fetch(PDO::FETCH_OBJ);

        if($res!=null)
        {
            $entity = new Sintoma();
            $entity->setId($res->Id);
            $entity->setNombre($res->Nombre);
            $entity->setPregunta($res->Pregunta);
            $entity->setEsPrincipal($res->EsPrincipal);                
            $entity->setEstado($res->Estado);        
            $entity->setEnfermedadId($res->EnfermedadId);      
            $entity->setEnfermedadNombre($res->EnfermedadNombre);  

            return $entity;  
        }else
        {
            return null;
        }               
    }

    public function add($entity)
    {        
        $enfermedadId = $entity->getEnfermedadId();
        $nombre = $entity->getNombre();
        $pregunta = $entity->getPregunta();
        $esPrincipal = $entity->getEsPrincipal();
        $estado = $entity->getEstado();
        $usuarioCreacion = $entity->getUsuarioCreacion();

        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.SintomaInsert ?,?,?,?,?,? ");
        $proc->bindParam(1, $enfermedadId, PDO::PARAM_INT);
        $proc->bindParam(2, $nombre, PDO::PARAM_STR);
        $proc->bindParam(3, $pregunta, PDO::PARAM_STR);
        $proc->bindParam(4, intval($esPrincipal), PDO::PARAM_INT);
        $proc->bindParam(5, intval($estado), PDO::PARAM_INT);
        $proc->bindParam(6, $usuarioCreacion, PDO::PARAM_STR);
        $proc->execute();
        $this->disconnect();

        $res=$proc->fetch(PDO::FETCH_OBJ);
        return $res->Id;
    }   

    public function edit($entity)
    {        
        $enfermedadId = $entity->getEnfermedadId();
        $nombre = $entity->getNombre();
        $pregunta = $entity->getPregunta();
        $esPrincipal = $entity->getEsPrincipal();
        $estado = $entity->getEstado();
        $usuarioModificacion = $entity->getUsuarioModificacion();
        $id = $entity->getId();

        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.SintomaUpdate ?,?,?,?,?,?,? ");
        $proc->bindParam(1, $enfermedadId, PDO::PARAM_INT);
        $proc->bindParam(2, $nombre, PDO::PARAM_STR);
        $proc->bindParam(3, $pregunta, PDO::PARAM_STR);
        $proc->bindParam(4, intval($esPrincipal), PDO::PARAM_INT);
        $proc->bindParam(5, intval($estado), PDO::PARAM_INT);
        $proc->bindParam(6, $usuarioModificacion, PDO::PARAM_STR);
        $proc->bindParam(7, intval($id), PDO::PARAM_INT);
        $proc->execute();
        $this->disconnect();

        $res=$proc->fetch(PDO::FETCH_OBJ);
        return $res->Id;        
    }     

    public function delete($entity)
    {
        $id = $entity->getId();

        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.SintomaDelete ? ");
        $proc->bindParam(1, intval($id), PDO::PARAM_INT);
        $proc->execute();
        $this->disconnect();

        $res=$proc->fetch(PDO::FETCH_OBJ);
        return $res->Id;        
    }      
}
?>    