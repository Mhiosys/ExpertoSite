<?php

class Constantes
{
  const FOLDER_IN = "D://ExpertoUpload/IN/";
  const FOLDER_OUT = "D://ExpertoUpload/OUT/";
  const ENFERMEDADCONTROLLER = "EnfermedadController";
  const SINTOMACONTROLLER = "SintomaController";
  const USUARIOCONTROLLER = "UsuarioController";
  const CARGACONTROLLER = "CargaController";
  const CANJECONTROLLER = "CanjeController";
  const ALERTACONTROLLER = "AlertaController";
  const ADD = "Add";
  const EDIT = "Edit";
  const DELETE = "Delete";
  const SEPARADOROBJETO = "|"; 
  const SISTEMA = "Experto"; 
  const WEBSITEBASE = "/ExpertoSite/"; 
  const FOLDER_EXE = "D:\ExpertoUpload\EXE\WorkerSchedulersService\WorkerSchedulersService.exe";
  const USEREXPERTO = "userExperto";
  const USEREXPERTOROLID = "userExpertoRolId";
  const AUTENTICAEXPERTO = "autenticaExperto";
  const ADMINISTRADORID = 1;
  const USUARIOID = 2;
  const ANONIMOID = 3;
  const TipoOperacionCargaDatos = 1;
  const TipoOperacionEnvioCorreoTope = 2;
  const TipoOperacionReenvioCorreo = 3;

  public static function getFolderIn()
  {
    return self::FOLDER_IN;
  }

  public static function getFolderOut()
  {
    return self::FOLDER_OUT;
  }

  public static function getFolderExe()
  {
    return self::FOLDER_EXE;
  }  

  public static function getENFERMEDADCONTROLLER()
  {
    return self::ENFERMEDADCONTROLLER;
  }

  public static function getSINTOMACONTROLLER()
  {
    return self::SINTOMACONTROLLER;
  }

  public static function getUSUARIOCONTROLLER()
  {
    return self::USUARIOCONTROLLER;
  }  

  public static function getCARGACONTROLLER()
  {
    return self::CARGACONTROLLER;
  }  

  public static function getCANJECONTROLLER()
  {
    return self::CANJECONTROLLER;
  }  

  public static function getALERTACONTROLLER()
  {
    return self::ALERTACONTROLLER;
  }  

  public static function getADD()
  {
    return self::ADD;
  }

  public static function getEDIT()
  {
    return self::EDIT;
  }

  public static function getDELETE()
  {
    return self::DELETE;
  } 

  public static function getSEPARADOROBJETO()
  {
    return self::SEPARADOROBJETO;
  } 

  public static function getSISTEMA()
  {
    return self::SISTEMA;
  }

  public static function getWEBSITEBASE()
  {
    return self::WEBSITEBASE;
  }  

  public static function getUSEREXPERTO()
  {
    return self::USEREXPERTO;
  }  

  public static function getUSEREXPERTOROLID()
  {
    return self::USEREXPERTOROLID;
  }   

  public static function getAUTENTICAEXPERTO()
  {
    return self::AUTENTICAEXPERTO;
  }  

  public static function getADMINISTRADORID()
  {
    return self::ADMINISTRADORID;
  }

  public static function getUSUARIOID()
  {
    return self::USUARIOID;
  }

  public static function getANONIMOID()
  {
    return self::ANONIMOID;
  }  

  public static function getTipoOperacionCargaDatos()
  {
    return self::TipoOperacionCargaDatos;
  }  

  public static function getTipoOperacionEnvioCorreoTope()
  {
    return self::TipoOperacionEnvioCorreoTope;
  }  

  public static function getTipoOperacionReenvioCorreo()
  {
    return self::TipoOperacionReenvioCorreo;
  }   
}

?>