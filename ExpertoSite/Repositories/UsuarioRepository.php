<?php
use Entity\Usuario;
require_once("../DALC/Database.php");
require_once("../Entity/Usuario.php");

class UsuarioRepository extends \Database
{    
    public function findAllFilter($whereModel, $start, $length, $order, $columnsModel)
    {        
        $orderString = '';
        $whereString = $whereModel;
        if(isset($order) && count($order)) {
            $orderBy = array();

            $columns = array(
            array('db' => 'Id'),
            array('db' => 'Username'),
            array('db' => 'Nombre'),
            array('db' => 'Apellido'),
            array('db' => 'Correo'),
            array('db' => 'Rol'),
            array('db' => 'Estado')
            );

            $dtColumns = ['Id', 'Username', 'Nombre', 'Apellido', 'Correo', 'Rol', 'Estado'];

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
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.UsuarioGetAllFilter ?,?,?,? ");
        $proc->bindParam(1, $whereString, PDO::PARAM_STR);
        $proc->bindParam(2, $orderString, PDO::PARAM_STR);
        $proc->bindParam(3, intval($start), PDO::PARAM_INT);
        $proc->bindParam(4, intval($length), PDO::PARAM_INT);
        $proc->execute();
        $this->disconnect();
    
        while($res=$proc->fetch(PDO::FETCH_OBJ)){
            $entity = new Usuario();
            $entity->setId($res->Id);
            $entity->setUsername($res->Username);
            $entity->setNombre($res->Nombre);
            $entity->setApellido($res->Apellido);
            $entity->setCorreo($res->Correo);
            $entity->setRolId($res->RolId);
            $entity->setRolNombre($res->RolNombre);
            $entity->setEstado($res->Estado);
            $entity->setCantidad($res->Cantidad);
            
            $result[]= $entity;
        }
    
        return isset($result)? $result : array();
    }

    public function findByUsername($username)
    {
        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.UsuarioGetByUsername ? ");
        $proc->bindParam(1, $username, PDO::PARAM_STR);
        $proc->execute();
        $this->disconnect();
        
        $res=$proc->fetch(PDO::FETCH_OBJ);
        if($res){
            $entity = new Usuario();
            $entity->setId($res->Id);
            $entity->setUsername($res->Username);
            $entity->setRolId($res->RolId);
            return $entity;
        }
        else{
            return null;
        }
    }   

    public function findById($id)
    {
        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.UsuarioGetById ? ");
        $proc->bindParam(1, $id, PDO::PARAM_INT);
        $proc->execute();
        $this->disconnect();
         
        $res=$proc->fetch(PDO::FETCH_OBJ);
        $entity = new Usuario();
        $entity->setId($res->Id);
        $entity->setUsername($res->Username);
        $entity->setNombre($res->Nombre);
        $entity->setApellido($res->Apellido);
        $entity->setCorreo($res->Correo);
        $entity->setRolId($res->RolId);
        $entity->setEstado($res->Estado);

        return $entity;
    } 

    public function add($entity)
    {   
        $username = $entity->getUsername();     
        $nombre = $entity->getNombre();
        $apellido = $entity->getApellido();
        $correo = $entity->getCorreo();
        $rolId = $entity->getRolId();
        $estado = $entity->getEstado();
        $usuarioCreacion = $entity->getUsuarioCreacion();

        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.UsuarioInsert ?,?,?,?,?,?,? ");
        $proc->bindParam(1, $username, PDO::PARAM_STR);
        $proc->bindParam(2, $nombre, PDO::PARAM_STR);
        $proc->bindParam(3, $apellido, PDO::PARAM_STR);
        $proc->bindParam(4, $correo, PDO::PARAM_STR);
        $proc->bindParam(6, intval($rolId), PDO::PARAM_INT);
        $proc->bindParam(7, intval($estado), PDO::PARAM_INT);
        $proc->bindParam(8, $usuarioCreacion, PDO::PARAM_STR);
        $proc->execute();
        $this->disconnect();

        $res=$proc->fetch(PDO::FETCH_OBJ);
        return $res->Id;
    }  

    public function edit($entity)
    {        
        $username = $entity->getUsername();     
        $nombre = $entity->getNombre();
        $apellido = $entity->getApellido();
        $correo = $entity->getCorreo();
        $rolId = $entity->getRolId();
        $estado = $entity->getEstado();
        $usuarioModificacion = $entity->getUsuarioModificacion();
        $id = $entity->getId();

        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.UsuarioUpdate ?,?,?,?,?,?,?,? ");
        $proc->bindParam(1, $username, PDO::PARAM_STR);
        $proc->bindParam(2, $nombre, PDO::PARAM_STR);
        $proc->bindParam(3, $apellido, PDO::PARAM_STR);
        $proc->bindParam(4, $correo, PDO::PARAM_STR);
        $proc->bindParam(6, intval($rolId), PDO::PARAM_INT);
        $proc->bindParam(7, intval($estado), PDO::PARAM_INT);
        $proc->bindParam(8, $usuarioModificacion, PDO::PARAM_STR);
        $proc->bindParam(9, intval($id), PDO::PARAM_INT);
        $proc->execute();
        $this->disconnect();

        $res=$proc->fetch(PDO::FETCH_OBJ);
        return $res->Id;        
    }   

    public function delete($entity)
    {
        $id = $entity->getId();

        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.UsuarioDelete ? ");
        $proc->bindParam(1, intval($id), PDO::PARAM_INT);
        $proc->execute();
        $this->disconnect();

        $res=$proc->fetch(PDO::FETCH_OBJ);
        return $res->Id;        
    }              
}
?>    