<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/especificos/PeriodoLectivoActual.php');
class ControladorPeriodoLectivoActual extends ControladorBase
{
   function consultar()
   { 
        $sql = "SELECT id, descripcion FROM PeriodoLectivo WHERE matriculable='1';";
        $parametros = array($idCarrera);
        $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
        if(is_null($respuesta[0])||$respuesta[0]==0){
           return false;
        }else{
            return $respuesta;
        }   
   }
}