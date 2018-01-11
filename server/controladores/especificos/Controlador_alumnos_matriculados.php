<?php
include_once('../controladores/Controlador_Base.php');
class Controlador_alumnos_matriculados extends Controlador_Base
{
   function consultar($args)
   { 
        $idJornada = $args["idJornada"];
        $idCarrera = $args["idCarrera"];
        $sql = "SELECT Persona.id, CONCAT(Persona.nombre1, ' ', Persona.nombre2, ' ', Persona.apellido1, ' ', Persona.apellido2) as 'nombreCompleto' FROM Persona INNER JOIN Cupo ON Cupo.idPersona = Persona.id INNER JOIN JornadaCarrera ON Cupo.idJornadaCarrera = JornadaCarrera.id INNER JOIN Carrera ON Carrera.id = JornadaCarrera.idCarrera INNER JOIN Jornada ON Jornada.id = JornadaCarrera.idJornada WHERE 1;";
        $parametros = array();
        if(!($idJornada == 0)){
            $sql = trim($sql, ';');
            $sql .= " AND Jornada.id = ?;";
            array_push($parametros, $idJornada);
        }
        if(!($idCarrera == 0)){
            $sql = trim($sql, ';');
            $sql .= " AND Carrera.id = ?;";
            array_push($parametros, $idCarrera);
        }        
        $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
        if(is_null($respuesta[0])||$respuesta[0]==0){
           return false;
        }else{
            return $respuesta;
        }   
   }
}