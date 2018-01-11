<?php
include_once('../controladores/Controlador_Base.php');
class Controlador_alumnos_matriculados extends Controlador_Base
{
   function consultar($args)
   { 
        $nivel = $args["nivel"];
        $idCarrera = $args["idCarrera"];
        $sql = "";
        $parametros = array();
        $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
        if(is_null($respuesta[0])||$respuesta[0]==0){
           return false;
        }else{
            return $respuesta;
        }   
   }
}