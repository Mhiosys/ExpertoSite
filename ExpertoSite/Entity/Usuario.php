<?php
namespace Entity;
class Usuario{
	var $Id;
	var $Username;
    var $Nombre;
    var $Apellido;
    var $Correo;
    var $CargoId;
	var $RolId;
	var $Estado;
	var $UsuarioCreacion;
	var $UsuarioModificacion;
	var $FechaHoraCreacion;
	var $FechaHoraModificacion;	

    var $CargoNombre;
    var $RolNombre;
    var $Cantidad;

    public function getId()
    {
        return $this->Id;
    }
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    public function getUsername()
    {
        return $this->Username;
    }
    public function setUsername($Username)
    {
        $this->Username = $Username;
    }    

    public function getNombre()
    {
        return $this->Nombre;
    }
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }     

    public function getApellido()
    {
        return $this->Apellido;
    }
    public function setApellido($Apellido)
    {
        $this->Apellido = $Apellido;
    }  
    
    public function getCorreo()
    {
        return $this->Correo;
    }
    public function setCorreo($Correo)
    {
        $this->Correo = $Correo;
    }       

    public function getCargoId()
    {
        return $this->CargoId;
    }
    public function setCargoId($CargoId)
    {
        $this->CargoId = $CargoId;
    } 

    public function getRolId()
    {
        return $this->RolId;
    }
    public function setRolId($RolId)
    {
        $this->RolId = $RolId;
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

    public function getCargoNombre()
    {
        return $this->CargoNombre;
    }
    public function setCargoNombre($CargoNombre)
    {
        $this->CargoNombre = $CargoNombre;
    } 
    
    public function getRolNombre()
    {
        return $this->RolNombre;
    }
    public function setRolNombre($RolNombre)
    {
        $this->RolNombre = $RolNombre;
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