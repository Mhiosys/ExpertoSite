<?php
use Entity\Response;
use Entity\JsonResult;
use Entity\Enfermedad;
use Entity\Log;

require_once("../Repositories/EnfermedadRepository.php");
require_once("../Repositories/LogRepository.php");
require_once("../Entity/Response.php");
require_once("../Entity/JsonResult.php");
require_once("../Entity/Enfermedad.php");
require_once("../Entity/Constantes.php");
require_once("../Entity/Log.php");

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'GetAll' : GetAll();break;
        case 'GetById' : GetById();break;
        case 'Add' : Add();break;
        case 'Edit' : Edit();break;
        case 'Delete' : Delete(); break;
    }
}
else{
    $modelRepository = new EnfermedadRepository();

    $start = $_POST["start"];
    $length = $_POST["length"];
    $draw = $_POST['draw'];
    $finish = $start + $length;
    $order = $_POST['order'];
    $columnsModel = $_POST['columns'];
    $whereModel = 'WHERE Estado IN (1,2)';
    $cantidad = 0;
    
    $result = $modelRepository->findAllFilter($whereModel, $start, $length, $order, $columnsModel);
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
    
    return($_SESSION[Constantes::getUSEREXPERTO()]);   
}

function GetAll() { 
    $respuesta = new JsonResult();

    try {

        $whereModel = 'WHERE Estado IN (1,2)';

        $modelEnfermedad = new EnfermedadRepository();
        $result = $modelEnfermedad->findAll($whereModel);
        
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

        $modelEnfermedad = new EnfermedadRepository();
        $result = $modelEnfermedad->findById($id);
        
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

        $entityEnfermedad = new Enfermedad();
        $entityEnfermedad->setId($modelView["Id"]);
        $entityEnfermedad->setNombre($modelView["Nombre"]);
        $entityEnfermedad->setDescripcion($modelView["Descripcion"]);
        $entityEnfermedad->setEstado($modelView["Estado"]);       
        $entityEnfermedad->setUsuarioCreacion(getUserNameController());

        $modelEnfermedadRepository = new EnfermedadRepository();    
        $result = $modelEnfermedadRepository->add($entityEnfermedad);

        if($result==0){
            $respuesta->setMessage("Ocurrió un error y no se pudo registrar");
            $respuesta->setWarning(true);
        }else{

            $modelLogRepository = new LogRepository();
            $entityLog = new Log();    
            $entityLog->setUsuario(getUserNameController());    
            $entityLog->setMensaje('Insertar Enfermedad Id='.$result);     
            $entityLog->setControlador(Constantes::getENFERMEDADCONTROLLER());
            $entityLog->setAccion(Constantes::getADD()); 
            $entityLog->setObjeto($result
                .Constantes::getSEPARADOROBJETO().$entityEnfermedad->getNombre()
                .Constantes::getSEPARADOROBJETO().$entityEnfermedad->getDescripcion()
                .Constantes::getSEPARADOROBJETO().$entityEnfermedad->getEstado()                
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

        $entityEnfermedad = new Enfermedad();
        $entityEnfermedad->setId($modelView["Id"]);
        $entityEnfermedad->setNombre($modelView["Nombre"]);
        $entityEnfermedad->setDescripcion($modelView["Descripcion"]);
        $entityEnfermedad->setEstado($modelView["Estado"]);       
        $entityEnfermedad->setUsuarioModificacion(getUserNameController());

        $modelEnfermedadRepository = new EnfermedadRepository();    
        $result = $modelEnfermedadRepository->edit($entityEnfermedad);

        if($result==0){
            $respuesta->setMessage("Ocurrió un error y no se pudo modificar");
            $respuesta->setWarning(true);
        }else{

            $modelLogRepository = new LogRepository();
            $entityLog = new Log();    
            $entityLog->setUsuario(getUserNameController());    
            $entityLog->setMensaje('Editar Enfermedad Id='.$result);     
            $entityLog->setControlador(Constantes::getENFERMEDADCONTROLLER());
            $entityLog->setAccion(Constantes::getEDIT()); 
            $entityLog->setObjeto($result
                .Constantes::getSEPARADOROBJETO().$entityEnfermedad->getNombre()
                .Constantes::getSEPARADOROBJETO().$entityEnfermedad->getDescripcion()
                .Constantes::getSEPARADOROBJETO().$entityEnfermedad->getEstado()                
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

        $entityEnfermedad = new Enfermedad();
        $entityEnfermedad->setId($modelView["Id"]);

        $modelEnfermedadRepository = new EnfermedadRepository();
        $result = $modelEnfermedadRepository->delete($entityEnfermedad);

        if($result==0){
            $respuesta->setMessage("No se puede eliminar debido a que hay cargas con este Tipo de Producto.");
            $respuesta->setWarning(true);
        }else{        
        
            $modelLogRepository = new LogRepository();
            $entityLog = new Log();    
            $entityLog->setUsuario(getUserNameController());    
            $entityLog->setMensaje('Eliminar Enfermedad Id='. $entityEnfermedad->getId());     
            $entityLog->setControlador(Constantes::getENFERMEDADCONTROLLER());
            $entityLog->setAccion(Constantes::getDELETE()); 
            $entityLog->setObjeto($entityEnfermedad->getId());
            $entityLog->setIdentificador($entityEnfermedad->getId());
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