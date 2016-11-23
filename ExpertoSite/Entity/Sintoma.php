<?php
namespace Entity;

class Sintoma{
	var $Id;
    var $EnfermedadId;
    var $Nombre;
    var $Pregunta;    
	var $EsPrincipal;
    var $Estado;
    var $UsuarioCreacion;
    var $UsuarioModificacion;
    var $FechaHoraCreacion;
    var $FechaHoraModificacion;

    var $Cantidad;
    var $EnfermedadNombre;

    public function getId()
    {
        return $this->Id;
    }
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    public function getEnfermedadId()
    {
        return $this->EnfermedadId;
    }
    public function setEnfermedadId($EnfermedadId)
    {
        $this->EnfermedadId = $EnfermedadId;
    }

    public function getNombre()
    {
        return $this->Nombre;
    }
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    public function getPregunta()
    {
        return $this->Pregunta;
    }
    public function setPregunta($Pregunta)
    {
        $this->Pregunta = $Pregunta;
    }    

    public function getEsPrincipal()
    {
        return $this->EsPrincipal;
    }
    public function setEsPrincipal($EsPrincipal)
    {
        $this->EsPrincipal = $EsPrincipal;
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

    public function getEnfermedadNombre()
    {
        return $this->EnfermedadNombre;
    }
    public function setEnfermedadNombre($EnfermedadNombre)
    {
        $this->EnfermedadNombre = $EnfermedadNombre;
    }    
}
?>