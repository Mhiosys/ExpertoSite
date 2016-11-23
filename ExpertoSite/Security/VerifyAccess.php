<?php
require_once("Entity/Constantes.php");
$sistema = Constantes::getSISTEMA();
$webSiteRoot = Constantes::getWEBSITEBASE();
@session_start();
$urlLocal = $_SERVER["REQUEST_URI"];
$verifiedUrl = false;

if($_SESSION[Constantes::getAUTENTICAEXPERTO()] != $sistema){
	header("Location: login.php");
	exit();
}else{
	$administradorUrls = [
		$webSiteRoot,
		$webSiteRoot."enfermedad.php",
		$webSiteRoot."sintoma.php",

		$webSiteRoot."atencion.php",

		$webSiteRoot."contacto.php",
		$webSiteRoot."error.php",
		$webSiteRoot."noAcceso.php"
	];

	$usuarioUrls = [
		$webSiteRoot,
		$webSiteRoot."atencion.php",

		$webSiteRoot."error.php",
		$webSiteRoot."noAcceso.php"
	];

	$anonimoUrls = [
		$webSiteRoot,
		$webSiteRoot."atencion.php",

		$webSiteRoot."error.php",
		$webSiteRoot."noAcceso.php"
	];	

	if(getRolId() == Constantes::getADMINISTRADORID()) {
		foreach ($administradorUrls as &$urlItem) {
	    	if(strtoupper($urlLocal) == strtoupper($urlItem)){
	    		$verifiedUrl = true;
	    	}
		}
	}

	if(getRolId() == Constantes::getUSUARIOID()) {
		foreach ($usuarioUrls as &$urlItem) {
	    	if(strtoupper($urlLocal) == strtoupper($urlItem)){
	    		$verifiedUrl = true;
	    	}
		}
	}

	if(getRolId() == Constantes::getANONIMOID()) {
		foreach ($anonimoUrls as &$urlItem) {			
	    	if(strtoupper($urlLocal) == strtoupper($urlItem)){
	    		$verifiedUrl = true;
	    	}
		}
	}

	if(!$verifiedUrl){
		header("Location: noAcceso.php");
		exit();		
	}	
}

function getUserName() { 
	@session_start();
    
    return($_SESSION[Constantes::getUSEREXPERTO()]);   
}

function getRolId() { 
	@session_start();
    
    return($_SESSION[Constantes::getUSEREXPERTOROLID()]);   
}

?>
