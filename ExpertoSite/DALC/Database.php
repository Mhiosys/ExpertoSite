<?php

$servidorBD="localhost";//serverName\instanceName
$usuarioBD="sa";
$contrasenaBD="sigcomt";
$base_datos="DiagnosticoExpertoBD";
$puerto="1433";

class Database{

	public $conexion;
	
	public function connect()
	{
	    global $servidorBD, $usuarioBD, $contrasenaBD, $base_datos, $puerto;
        if(!isset($this->conexion))
        {
            try {
                $this->conexion = new PDO('sqlsrv:Server='.$servidorBD.';Database='.$base_datos, $usuarioBD, $contrasenaBD);
                $this->conexion->query("SET NAMES 'utf8'");
                //$this->execute();
            }
            catch (PDOException $e) {
                echo "¡Error!: " . $e->getMessage() . "";
                die();
            }
        }
	}
	
	public function query($sql)
	{
        $resultado = $this->conexion->query($sql);
        if(!$resultado){
            echo 'SQL Error: ' . sqlsrv_errors();
            exit;
        }
        return $resultado;
	}
	
	public function disconnect()
	{
	    $this->conexion = null;
	}
	
	function countRows($result){
	    $rows = $result->fetchAll();
	    $num_rows = count($rows);
	    return $num_rows;
	}	

}
?>