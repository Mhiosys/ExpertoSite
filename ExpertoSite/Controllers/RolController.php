<?php
use Entity\Response;
use Entity\JsonResult;
use Entity\Rol;

require_once("../Repositories/RolRepository.php");
require_once("../Entity/Response.php");
require_once("../Entity/JsonResult.php");
require_once("../Entity/Rol.php");

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'GetAll' : GetAll();break;
        case 'GetById' : GetById();break;
    }
}
else{    

    $respuesta = new JsonResult();
    $respuesta->setSuccess(true);
    $respuesta->setWarning(true);
    $respuesta->setMessage("La acción solicitada no se encuentra habilitada");
    $respuesta->setData($result);

    header('Content-type: application/json; charset=utf-8');
    echo json_encode($respuesta);    
}

function GetAll() { 
    $respuesta = new JsonResult();

    try {

        $whereModel = 'WHERE Estado IN (1,2)';

        $modelRol = new RolRepository();
        $result = $modelRol->findAllFilter($whereModel);
        
        if(count($result)==0){
            $respuesta->setSuccess(true);
            $respuesta->setWarning(true);
            $respuesta->setMessage("No se ha encontrado registro alguno");
            $respuesta->setData($result);              
        }else{     
            $respuesta->setSuccess(true);
            $respuesta->setWarning(false);
            $respuesta->setMessage("Todo Ok");
            $respuesta->setData($result);            
        }
    } catch (Exception $e) {
        $respuesta->setSuccess(false);  
        $respuesta->setMessage($e->getMessage());
    }

    header('Content-type: application/json; charset=utf-8');
    echo json_encode($respuesta, JSON_FORCE_OBJECT); 
}

function GetById(){

    $respuesta = new JsonResult();

    try {

        $modelView = $_POST["modelView"];
        $id=0;
        if(isset($modelView["Id"]) ) {
            $id = ($modelView["Id"]=='')?0:$modelView["Id"];
        }

        $modelRol = new RolRepository();
        $result = $modelRol->findById($id);
        
        if(count($result)==0){
            $respuesta->setSuccess(true);
            $respuesta->setWarning(true);
            $respuesta->setMessage("No se ha encontrado registro alguno");
            $respuesta->setData($result);              
        }else{     
            $respuesta->setSuccess(true);
            $respuesta->setWarning(false);
            $respuesta->setMessage("Todo Ok");
            $respuesta->setData($result);            
        }
    } catch (Exception $e) {
        $respuesta->setSuccess(false);  
        $respuesta->setMessage($e->getMessage());
    }

    header('Content-type: application/json; charset=utf-8');
    echo json_encode($respuesta, JSON_FORCE_OBJECT);
}

?>