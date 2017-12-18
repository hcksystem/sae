<?php
include_once('../controladores/ControladorBase.php');
class ControladorEstudiantesSolicitudMatricula extends ControladorBase
{
   function consultar()
   { 
        $sql = "SELECT id as 'idPersona', CONCAT(nombre1,' ',nombre2,' ',apellido1,' ',apellido2) as 'nombreCompleto' FROM Persona WHERE id IN (SELECT DISTINCT(idPersona) FROM SolicitudMatricula WHERE idEstadoSolicitud=1) ORDER BY nombreCompleto ASC;";
        $parametros = array();
        $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
        if(is_null($respuesta[0])||$respuesta[0]==0){
           return false;
        }else{
            return $respuesta;
        }   
   }
}