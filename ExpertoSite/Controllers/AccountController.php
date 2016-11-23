<?php
use Entity\JsonResult;
use Entity\Usuario;
require_once("../Security/Ldap.php");
require_once("../Entity/JsonResult.php");
require_once("../Entity/Constantes.php");
require_once("../Repositories/UsuarioRepository.php");
require_once("../Entity/Usuario.php");

$respuesta = new JsonResult();

if( isset($_POST['usuario']) ) {
    $usuario = ($_POST['usuario']=='')?'':$_POST['usuario'];
}else{
    $usuario = '';
}

if( isset($_POST['clave']) ) {
    $clave = ($_POST['clave']=='')?'':$_POST['clave'];
}else{
    $clave = '';
}
/*
try {
    $usuarioDomain = verifyCredentialsAD($usuario,$clave);
} catch (Exception $e) {
    $usuarioDomain=2;
    $respuesta->setMessage($e->getMessage());
}
*/
$usuarioDomain=$usuario;

if($usuarioDomain == "0" || $usuarioDomain == ''){
    $respuesta->setSuccess(true);
    $respuesta->setWarning(true);
    $respuesta->setMessage("Credenciales de dominio incorrectas");
    $respuesta->setData('login.php'); 
}else if($usuarioDomain == 2){
    $respuesta->setSuccess(false);
    $respuesta->setWarning(false);
    $respuesta->setData('login.php');    
}else if($usuarioDomain!=null){
    $_SERVER = array();
    $_SESSION = array();
    
    $model = new UsuarioRepository();
    $result = $model->findByUsername($usuario);    
    
    if($result!=null){
        session_start();
        $_SESSION[Constantes::getUSEREXPERTO()] = $result->getUsername();
        $_SESSION[Constantes::getUSEREXPERTOROLID()] = $result->getRolId();
        $_SESSION[Constantes::getAUTENTICAEXPERTO()] = Constantes::getSistema();        
    
        $respuesta->setSuccess(true);
        $respuesta->setWarning(false);
        $respuesta->setMessage("Todo Ok");
        $respuesta->setData('enfermedad.php');   
    }else{
        $respuesta->setSuccess(true);
        $respuesta->setWarning(true);
        $respuesta->setMessage("El usuario no tiene acceso al Sistema Experto");
        $respuesta->setData('login.php');        
    }
    
}

header('Content-type: application/json; charset=utf-8');
echo json_encode($respuesta, JSON_FORCE_OBJECT);

?>
