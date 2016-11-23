<?php
namespace Entity;

class Enfermedad{
	var $Id;
	var $Nombre;
	var $Descripcion;
	var $Estado;
	var $UsuarioCreacion;
	var $UsuarioModificacion;
	var $FechaHoraCreacion;
	var $FechaHoraModificacion;

    var $Cantidad;

    public function getId()
    {
        return $this->Id;
    }
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    public function getNombre()
    {
        return $this->Nombre;
    }
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
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

    public function getUsuarioCreacion()
    {
        return $this->UsuarioCreacion;
    }
    public function setUsuarioCreacion($UsuarioCreacion)
    {
        $this->UsuarioCreacion = $UsuarioCreacion;
    }

    public function getUsuarioModificacion()
    {
        return $this->UsuarioModificacion;
    }
    public function setUsuarioModificacion($UsuarioModificacion)
    {
        $this->UsuarioModificacion = $UsuarioModificacion;
    }    

    public function getFechaHoraCreacion()
    {
        return $this->FechaHoraCreacion;
    }
    public function setFechaHoraCreacion($FechaHoraCreacion)
    {
        $this->FechaHoraCreacion = $FechaHoraCreacion;
    }  

    public function getFechaHoraModificacion()
    {
        return $this->FechaHoraModificacion;
    }
    public function setFechaHoraModificacion($FechaHoraModificacion)
    {
        $this->FechaHoraModificacion = $FechaHoraModificacion;
    }    

    public function getCantidad()
    {
        return $this->Cantidad;
    }
    public function setCantidad($Cantidad)
    {
        $this->Cantidad = $Cantidad;
    }             
}
?>