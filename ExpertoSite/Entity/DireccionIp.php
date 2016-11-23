<?php
/**
*
*/
class DireccionIp
{
	var $id;
	var $ip;
	var $descripcion;
	
	public function getId()
	{
		return $this->id;
	}
	public function getIp()
	{
		return $this->ip;
	}
	public function getDescripcion()
	{
		return $this->descripcion;
	}

	public function setId($id)
	{
		$this->id=$id;
	}
	public function setIp($ip)
	{
		$this->ip=$ip;
	}	
	public function setDescripcion($descripcion)
	{
		$this->descripcion=$descripcion;
	}
}
?>