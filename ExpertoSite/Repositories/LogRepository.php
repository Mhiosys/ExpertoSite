<?php

require_once("../DALC/Database.php");
require_once("../Entity/Log.php");

class LogRepository extends Database {

    public function add($entity)
    {
        $usuario = $entity->getUsuario();
        $mensaje = $entity->getMensaje();
        $controlador = $entity->getControlador();
        $accion = $entity->getAccion();
        $objeto = $entity->getObjeto();
        $identificador = $entity->getIdentificador();

        $this->connect();
        $proc = $this->conexion->prepare("EXEC DiagnosticoExperto.InsertLog ?,?,?,?,?,? ");
        $proc->bindParam(1, $usuario, PDO::PARAM_STR);
        $proc->bindParam(2, $mensaje, PDO::PARAM_STR);
        $proc->bindParam(3, $controlador, PDO::PARAM_STR);
        $proc->bindParam(4, $accion, PDO::PARAM_STR);
        $proc->bindParam(5, $objeto, PDO::PARAM_STR);
        $proc->bindParam(6, $identificador, PDO::PARAM_INT);

        $proc->execute();  
        $this->disconnect();
    }	
}

?>		