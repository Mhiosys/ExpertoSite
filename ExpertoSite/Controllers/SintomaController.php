<?php
use Entity\Response;
use Entity\JsonResult;
use Entity\Sintoma;
use Entity\Log;

require_once("../Repositories/SintomaRepository.php");
require_once("../Repositories/LogRepository.php");
require_once("../Entity/Response.php");
require_once("../Entity/JsonResult.php");
require_once("../Entity/Sintoma.php");
require_once("../Entity/Constantes.php");
require_once("../Entity/Log.php");

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'GetAll' : GetAll();break;
        case 'GetAllByEnfermedad' : GetAllByEnfermedad();break;
        case 'GetById' : GetById();break;
        case 'Add' : Add();break;
        case 'Edit' : Edit();break;
        case 'Delete' : Delete(); break;
        case 'GetFirstPrincipal' : GetFirstPrincipal(); break;
        case 'GetNextSintoma' : GetNextSintoma(); break;
        case 'GetNextPrincipalByEnfermedadId' : GetNextPrincipalByEnfermedadId(); break;        
    }
}
else{
    $modelRepository = new SintomaRepository();

    $start = $_POST["start"];
    $length = $_POST["length"];
    $draw = $_POST['draw'];
    $finish = $start + $length;
    $order = $_POST['order'];
    $columnsModel = $_POST['columns'];
    $whereModel = 'WHERE V.Estado IN (1,2)';
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

        $modelSintoma = new SintomaRepository();
        $result = $modelSintoma->findAll($whereModel);
        
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

function GetAllByEnfermedad() { 
    $respuesta = new JsonResult();

    try {

        $modelView = $_POST["modelView"];
        $enfermedadId=0;
        if(isset($modelView["EnfermedadId"]) ) {
            $enfermedadId = ($modelView["EnfermedadId"]=='')?0:$modelView["EnfermedadId"];
        }        

        $modelSintoma = new SintomaRepository();
        $result = $modelSintoma->findAllByEnfermedad($enfermedadId);
        
        if(count($result)==0){
            $respuesta->setSuccess(true);
            $respuesta->setWarning(true);
            $respuesta->setMessage("No se ha encontraron Sintomas para este Tipo de Producto.");
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

        $modelSintoma = new SintomaRepository();
        $result = $modelSintoma->findById($id);
        
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

        $entitySintoma = new Sintoma();
        $entitySintoma->setId($modelView["Id"]);
        $entitySintoma->setEnfermedadId($modelView["EnfermedadId"]);
        $entitySintoma->setNombre($modelView["Nombre"]);
        $entitySintoma->setPregunta($modelView["Pregunta"]);
        $entitySintoma->setEsPrincipal($modelView["EsPrincipal"]);
        $entitySintoma->setEstado($modelView["Estado"]);       
        $entitySintoma->setUsuarioCreacion(getUserNameController());

        $modelSintomaRepository = new SintomaRepository();    
        $result = $modelSintomaRepository->add($entitySintoma);

        if($result==0){
            $respuesta->setMessage("Ocurrió un error y no se pudo registrar");
            $respuesta->setWarning(true);
        }else{

            $modelLogRepository = new LogRepository();
            $entityLog = new Log();    
            $entityLog->setUsuario(getUserNameController());    
            $entityLog->setMensaje('Insertar Sintoma Id='.$result);     
            $entityLog->setControlador(Constantes::getSINTOMACONTROLLER());
            $entityLog->setAccion(Constantes::getADD()); 
            $entityLog->setObjeto($result
                .Constantes::getSEPARADOROBJETO().$entitySintoma->getEnfermedadId()
                .Constantes::getSEPARADOROBJETO().$entitySintoma->getNombre()
                .Constantes::getSEPARADOROBJETO().$entitySintoma->getPregunta()
                .Constantes::getSEPARADOROBJETO().$entitySintoma->getEsPrincipal()
                .Constantes::getSEPARADOROBJETO().$entitySintoma->getEstado()                
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

        $entitySintoma = new Sintoma();
        $entitySintoma->setId($modelView["Id"]);
        $entitySintoma->setEnfermedadId($modelView["EnfermedadId"]);
        $entitySintoma->setNombre($modelView["Nombre"]);
        $entitySintoma->setPregunta($modelView["Pregunta"]);
        $entitySintoma->setEsPrincipal($modelView["EsPrincipal"]);
        $entitySintoma->setEstado($modelView["Estado"]);       
        $entitySintoma->setUsuarioModificacion(getUserNameController());

        $modelSintomaRepository = new SintomaRepository();    
        $result = $modelSintomaRepository->edit($entitySintoma);

        if($result==0){
            $respuesta->setMessage("Ocurrió un error y no se pudo modificar");
            $respuesta->setWarning(true);
        }else if($result==-1){
            $respuesta->setMessage("No se puede modificar debido a que se ha realizado un canje con este tipo de vale");
            $respuesta->setWarning(true);            
        }else{

            $modelLogRepository = new LogRepository();
            $entityLog = new Log();    
            $entityLog->setUsuario(getUserNameController());    
            $entityLog->setMensaje('Editar Sintoma Id='.$result);     
            $entityLog->setControlador(Constantes::getSINTOMACONTROLLER());
            $entityLog->setAccion(Constantes::getEDIT()); 
            $entityLog->setObjeto($result
                .Constantes::getSEPARADOROBJETO().$entitySintoma->getEnfermedadId()
                .Constantes::getSEPARADOROBJETO().$entitySintoma->getNombre()
                .Constantes::getSEPARADOROBJETO().$entitySintoma->getPregunta()
                .Constantes::getSEPARADOROBJETO().$entitySintoma->getEsPrincipal()
                .Constantes::getSEPARADOROBJETO().$entitySintoma->getEstado()                
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

        $entitySintoma = new Sintoma();
        $entitySintoma->setId($modelView["Id"]);

        $modelSintomaRepository = new SintomaRepository();
        $result = $modelSintomaRepository->delete($entitySintoma);

        if($result==0){
            $respuesta->setMessage("No se puede eliminar debido a que hay canjes con este tipo de Sintoma.");
            $respuesta->setWarning(true);
        }else{        
        
            $modelLogRepository = new LogRepository();
            $entityLog = new Log();    
            $entityLog->setUsuario(getUserNameController());    
            $entityLog->setMensaje('Eliminar Sintoma Id='. $entitySintoma->getId());     
            $entityLog->setControlador(Constantes::getSINTOMACONTROLLER());
            $entityLog->setAccion(Constantes::getDELETE()); 
            $entityLog->setObjeto($entitySintoma->getId());
            $entityLog->setIdentificador($entitySintoma->getId());
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

function GetFirstPrincipal(){
    $respuesta = new JsonResult();

    try {

        $modelSintoma = new SintomaRepository();
        $result = $modelSintoma->findFirstPrincipal();
        
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

function GetNextSintoma(){
    $respuesta = new JsonResult();

    try {

        $modelView = $_POST["modelView"];

        $modelSintoma = new SintomaRepository();
        $result = $modelSintoma->findNext($modelView["EnfermedadId"], $modelView["Next"]);
        
        if($result == null){
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

function GetNextPrincipalByEnfermedadId(){
    $respuesta = new JsonResult();

    try {

        $modelView = $_POST["modelView"];
        $modelSintoma = new SintomaRepository();
        $result = $modelSintoma->findNextPrincipalByEnfermedadId($modelView["EnfermedadId"]);
        
        if($result == null){
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