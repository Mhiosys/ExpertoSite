<?php
namespace Entity;

class Log
{
	var $Id;
	var $Usuario;
	var $Mensaje;
	var $Controlador;
	var $Accion;
	var $FechaRegistro;
	var $Objeto;
	var $Identificador;
	
	
	public function getId()
	{
		return $this->Id;
	}
	public function getUsuario()
	{
		return $this->Usuario;
	}
	public function getMensaje()
	{
		return $this->Mensaje;
	}
	public function getControlador()
	{
		return $this->Controlador;
	}
	public function getAccion()
	{
		return $this->Accion;
	}
	public function getFechaRegistro()
	{
		return $this->FechaRegistro;
	}
	public function getObjeto()
	{
		return $this->Objeto;
	}
	public function getIdentificador()
	{
		return $this->Identificador;
	}


	public function setId($Id)
	{
		$this->Id=$Id;
	}
	public function setUsuario($Usuario)
	{
		$this->Usuario=$Usuario;
	}
	public function setMensaje($Mensaje)
	{
		$this->Mensaje=$Mensaje;
	}
	public function setControlador($Controlador)
	{
		$this->Controlador=$Controlador;
	}
	public function setAccion($Accion)
	{
		$this->Accion=$Accion;
	}
	public function setFechaRegistro($FechaRegistro)
	{
		$this->FechaRegistro=$FechaRegistro;
	}
	public function setObjeto($Objeto)
	{
		$this->Objeto=$Objeto;
	}
	public function setIdentificador($Identificador)
	{
		$this->Identificador=$Identificador;
	}	
			
}
?>