<?php
use Entity\Response;
use Entity\JsonResult;
use Entity\Usuario;
use Entity\Log;

require_once("../Repositories/UsuarioRepository.php");
require_once("../Repositories/LogRepository.php");
require_once("../Entity/Response.php");
require_once("../Entity/JsonResult.php");
require_once("../Entity/Usuario.php");
require_once("../Entity/Constantes.php");
require_once("../Entity/Log.php");

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'GetById' : GetById();break;
        case 'Add' : Add();break;
        case 'Edit' : Edit();break;
        case 'Delete' : Delete(); break;        
    }
}
else{
    $model = new UsuarioRepository();

    $start = $_POST["start"];
    $length = $_POST["length"];
    $draw = $_POST['draw'];
    $finish = $start + $length;
    $order = $_POST['order'];
    $columnsModel = $_POST['columns'];
    $whereModel = 'WHERE U.Estado IN (1,2)';
    $cantidad = 0;
    
    $result = $model->findAllFilter($whereModel, $start, $length, $order, $columnsModel);
    if(count($result)>0){
        $cantidad = $result[0]->getCantidad();
    }

    $response = array(
    "draw"            => intval($draw),   
    "recordsTotal"    => intval($cantidad),  
    "recordsFiltered" => intval($cantidad),
    "data"            => $result,        
    "inicio"          => $start,
    "fin"             => $finish
    );

    header('Content-type: application/json; charset=utf-8');
    echo json_encode($response);    
}

function getUserNameController() { 
    @session_start();
    
    return($_SESSION[Constantes::getUSERGIFTCARD()]);   
}

function GetById(){

    $respuesta = new JsonResult();

    try {

        $modelView = $_POST["modelView"];
        $id=0;
        if(isset($modelView["Id"]) ) {
            $id = ($modelView["Id"]=='')?0:$modelView["Id"];
        }

        $modelUsuario = new UsuarioRepository();
        $result = $modelUsuario->findById($id);
        
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

function Add(){

    $respuesta = new JsonResult();

    try {

        $modelView = $_POST["modelView"];

        $entityUsuario = new Usuario();
        $entityUsuario->setId($modelView["Id"]);
        $entityUsuario->setUsername($modelView["Username"]);
        $entityUsuario->setNombre($modelView["Nombre"]);
        $entityUsuario->setApellido($modelView["Apellido"]);
        $entityUsuario->setCorreo($modelView["Correo"]);
        $entityUsuario->setCargoId($modelView["CargoId"]);
        $entityUsuario->setRolId($modelView["RolId"]);
        $entityUsuario->setEstado($modelView["Estado"]);       
        $entityUsuario->setUsuarioCreacion(getUserNameController());

        $modelUsuarioRepository = new UsuarioRepository();    
        $result = $modelUsuarioRepository->add($entityUsuario);

        if($result==0){
            $respuesta->setMessage("Ocurrió un error y no se pudo registrar");
            $respuesta->setWarning(true);
        }else{

            $modelLogRepository = new LogRepository();
            $entityLog = new Log();    
            $entityLog->setUsuario(getUserNameController());    
            $entityLog->setMensaje('Insertar Usuario Id='.$result);     
            $entityLog->setControlador(Constantes::getUSUARIOCONTROLLER());
            $entityLog->setAccion(Constantes::getADD()); 
            $entityLog->setObjeto($result
                .Constantes::getSEPARADOROBJETO().$entityUsuario->getUsername()
                .Constantes::getSEPARADOROBJETO().$entityUsuario->getNombre()
                .Constantes::getSEPARADOROBJETO().$entityUsuario->getApellido()
                .Constantes::getSEPARADOROBJETO().$entityUsuario->getCorreo()
                .Constantes::getSEPARADOROBJETO().$entityUsuario->getCargoId()
                .Constantes::getSEPARADOROBJETO().$entityUsuario->getRolId()
                .Constantes::getSEPARADOROBJETO().$entityUsuario->getEstado()                
            ); 
            $entityLog->setIdentificador($result);
            $modelLogRepository->add($entityLog);

            $respuesta->setMessage("Todo Ok");
            $respuesta->setWarning(false);        
        } 

        $respuesta->setSuccess(true);    
        $respuesta->setData($result);        
        
    } catch (Exception $e) {
        $respuesta->setSuccess(false);  
        $respuesta->setMessage($e->getMessage());
    }

    header('Content-type: application/json; charset=utf-8');
    echo json_encode($respuesta, JSON_FORCE_OBJECT);
}

function Edit(){

    $respuesta = new JsonResult();

    try {
        
        $modelView = $_POST["modelView"];

        $entityUsuario = new Usuario();
        $entityUsuario->setId($modelView["Id"]);
        $entityUsuario->setUsername($modelView["Username"]);
        $entityUsuario->setNombre($modelView["Nombre"]);
        $entityUsuario->setApellido($modelView["Apellido"]);
        $entityUsuario->setCorreo($modelView["Correo"]);
        $entityUsuario->setCargoId($modelView["CargoId"]);
        $entityUsuario->setRolId($modelView["RolId"]);
        $entityUsuario->setEstado($modelView["Estado"]);      
        $entityUsuario->setUsuarioModificacion(getUserNameController());

        $modelUsuarioRepository = new UsuarioRepository();    
        $result = $modelUsuarioRepository->edit($entityUsuario);

        if($result==0){
            $respuesta->setMessage("Ocurrió un error y no se pudo modificar");
            $respuesta->setWarning(true);
        }else{

            $modelLogRepository = new LogRepository();
            $entityLog = new Log();    
            $entityLog->setUsuario(getUserNameController());    
            $entityLog->setMensaje('Editar Usuario Id='.$result);     
            $entityLog->setControlador(Constantes::getUSUARIOCONTROLLER());
            $entityLog->setAccion(Constantes::getEDIT()); 
            $entityLog->setObjeto($result
                .Constantes::getSEPARADOROBJETO().$entityUsuario->getUsername()
                .Constantes::getSEPARADOROBJETO().$entityUsuario->getNombre()
                .Constantes::getSEPARADOROBJETO().$entityUsuario->getApellido()
                .Constantes::getSEPARADOROBJETO().$entityUsuario->getCorreo()
                .Constantes::getSEPARADOROBJETO().$entityUsuario->getCargoId()
                .Constantes::getSEPARADOROBJETO().$entityUsuario->getRolId()
                .Constantes::getSEPARADOROBJETO().$entityUsuario->getEstado()                
            ); 
            $entityLog->setIdentificador($result);
            $modelLogRepository->add($entityLog);

            $respuesta->setMessage("Todo Ok");
            $respuesta->setWarning(false);        
        } 

        $respuesta->setSuccess(true);    
        $respuesta->setData($result);

    } catch (Exception $e) {
        $respuesta->setSuccess(false);  
        $respuesta->setMessage($e->getMessage());
    }    

    header('Content-type: application/json; charset=utf-8');
    echo json_encode($respuesta, JSON_FORCE_OBJECT);
}    

function Delete(){

    $respuesta = new JsonResult();

    try {

        $modelView = $_POST["modelView"];

        $entityUsuario = new Usuario();
        $entityUsuario->setId($modelView["Id"]);

        $modelUsuarioRepository = new UsuarioRepository();
        $result = $modelUsuarioRepository->delete($entityUsuario);

        if($result==0){
            $respuesta->setMessage("No se puede eliminar debido a que no existe dicho registro");
            $respuesta->setWarning(true);
        }else{        
        
            $modelLogRepository = new LogRepository();
            $entityLog = new Log();    
            $entityLog->setUsuario(getUserNameController());    
            $entityLog->setMensaje('Eliminar Usuario Id='. $entityUsuario->getId());     
            $entityLog->setControlador(Constantes::getUSUARIOCONTROLLER());
            $entityLog->setAccion(Constantes::getDELETE()); 
            $entityLog->setObjeto($entityUsuario->getId());
            $entityLog->setIdentificador($entityUsuario->getId());
            $modelLogRepository->add($entityLog);

            $respuesta->setSuccess(true);
            $respuesta->setWarning(false);    
            $respuesta->setMessage("Todo Ok");
        }

        $respuesta->setSuccess(true);    
        $respuesta->setData($result);        

    } catch (Exception $e) {
        $respuesta->setSuccess(false);
        $respuesta->setMessage($e->getMessage());
    }

    header('Content-type: application/json; charset=utf-8');
    echo json_encode($respuesta, JSON_FORCE_OBJECT);
}
?>