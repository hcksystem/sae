<?php
include_once("../config/ConexionBaseDatos.php");
class AdministradorBaseDatos
{
    private $DatosConexionActual;
    private $Conexion;

    public function __construct($nombreConexion){
        if (!$this->encontrarConexion($nombreConexion))
        {
            die("Conexión $nombreConexion no encontrada.");
        }
    }

    private function encontrarConexion($nombreConexion){
        $DatosConexiones = ConexionBaseDatos::DatosConexiones();
        foreach($DatosConexiones as $DatosConexion){
            if($DatosConexion->nombreConexion==$nombreConexion){
                $this->DatosConexionActual = $DatosConexion;
                return true;
            }
        }
        return false;
    }

    private function conectar(){
        $DatosAbrirConexion = $this->DatosConexionActual;
        try 
        {
            $this->Conexion = new PDO("mysql:host=$DatosAbrirConexion->servidor;dbname=$DatosAbrirConexion->baseDatos;charset=utf8", $DatosAbrirConexion->usuario, $DatosAbrirConexion->clave,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            return true;
        }
        catch (PDOException $e) 
        {
            return false;
        }
    }
    
    private function desconectar(){
        $this->Conexion = null;
    }

    private function consultar($sql){
        $stmt 	= $this->Conexion->prepare($sql);
        $stmt->execute();
        $array=array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $array[]=$row;
        }
        if(!count($array)==0){
            return $array;
        }
        return "Comando Ejecutado: ".$sql;
    }

    public function ejecutarConsulta($sql){
        $this->conectar();
        $salida = $this->consultar($sql);
        $this->desconectar();
        return $salida;
    }
}