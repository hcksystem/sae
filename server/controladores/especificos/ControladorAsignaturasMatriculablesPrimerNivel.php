<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/especificos/AsignaturasMatriculablesPrimerNivel.php');
class ControladorAsignaturasMatriculablesPrimerNivel extends ControladorBase
{
   function consultar(String $idCarrera)
   { 
        // CIFRAR LA CLAVE
        $sql = "SELECT Asignatura.* FROM Asignatura INNER JOIN Malla ON Asignatura.idMalla = Malla.id INNER JOIN Carrera ON Malla.idCarrera = Carrera.id WHERE Asignatura.nivel = 1 AND Carrera.id=?;";
        $parametros = array($idCarrera);
        $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
        if(is_null($respuesta[0])||$respuesta[0]==0){
           return false;
        }else{
            return $respuesta;
        }   
   }
}