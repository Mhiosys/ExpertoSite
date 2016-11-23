<?php
namespace Entity;

class Rol
{
	var $Id;
	var $Nombre;
	var $Descripcion;
	var $Estado;
	
	public function getId()
	{
		return $this->Id;
	}
	public function getNombre()
	{
		return $this->Nombre;
	}

	public function setId($Id)
	{
		$this->Id=$Id;
	}
	public function setNombre($Nombre)
	{
		$this->Nombre=$Nombre;
	}

    public function getDescripcion()
    {
        return $this->Descripcion;
    }
    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
    }	

    public function getEstado()
    {
        return $this->Estado;
    }
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }	
}
?>