<?php
include_once('../controladores/Controlador_Base.php');
class Controlador_chat extends Controlador_Base
{
    function consultar_miembros_sala($args)
    { 
        $idPeriodoAcademico = $args["idPeriodoAcademico"];
        $idCarrera = $args["idCarrera"];
        $idAsignatura = $args["idAsignatura"];
        $idJornada = $args["idJornada"];
        $parametros = array();
        $sql = "SELECT DISTINCT Persona.identificacion, Persona.nombre1, Persona.nombre2, Persona.apellido1, Persona.apellido2, Persona.telefonoCelular, Persona.telefonoDomicilio, Persona.correoElectronicoInstitucional, Genero.descripcion as 'Genero' FROM Asignatura INNER JOIN Malla ON Malla.id = Asignatura.idMalla INNER JOIN Carrera ON Carrera.id = Malla.idCarrera INNER JOIN MatriculaAsignatura ON MatriculaAsignatura.idAsignatura = Asignatura.id INNER JOIN Matricula ON MatriculaAsignatura.idMatricula = Matricula.id INNER JOIN Jornada ON Jornada.id = Matricula.idJornada INNER JOIN Persona ON Persona.id = Matricula.idPersona INNER JOIN Genero ON Genero.id = Persona.idGenero WHERE 1;";
        if($idJornada == null && $idPeriodoLectivo == null && $idCarrera == null && $idAsignatura == null){    
            return $this->ejecutar_sql($sql, $parametros);
        }
        if(!($idPeriodoAcademico == null)){
            $sql = trim($sql, ';');
            $sql .= " AND Asignatura.idPeriodoAcademico = ?;";
            array_push($parametros, $idPeriodoAcademico);
        }
        if(!($idCarrera == null)){
            $sql = trim($sql, ';');
            $sql .= " AND Carrera.id = ?;";
            array_push($parametros, $idCarrera);
        }
        if(!($idAsignatura == null)){
            $sql = trim($sql, ';');
            $sql .= " AND Asignatura.id = ?;";
            array_push($parametros, $idAsignatura);
        }
        if(!($idJornada == null)){
            $sql = trim($sql, ';');
            $sql .= " AND Jornada.id = ?;";
            array_push($parametros, $idJornada);
        }        
        return $this->ejecutar_sql($sql, $parametros);   
    }

    function consultar_salas($args)
    { 
        $idPersona = $args["idPersona"];
        $parametros = array();
        if($idPersona == null){
            $sql = "SELECT DISTINCT Carrera.id as 'idCarrera', Carrera.descripcion as 'Carrera', Asignatura.nombre as 'Asignatura', Asignatura.idPeriodoAcademico as 'Nivel' FROM Asignatura INNER JOIN Malla ON Malla.id = Asignatura.idMalla INNER JOIN Carrera ON Carrera.id = Malla.idCarrera;";
        }else {
            $sql = "SELECT DISTINCT Carrera.id as 'idCarrera', Carrera.descripcion as 'Carrera', Asignatura.nombre as 'Asignatura', Asignatura.idPeriodoAcademico as 'Nivel', Jornada.descripcion as 'Jornada' FROM Asignatura INNER JOIN Malla ON Malla.id = Asignatura.idMalla INNER JOIN Carrera ON Carrera.id = Malla.idCarrera INNER JOIN MatriculaAsignatura ON MatriculaAsignatura.idAsignatura = Asignatura.id INNER JOIN Matricula ON MatriculaAsignatura.idMatricula = Matricula.id INNER JOIN Jornada ON Jornada.id = Matricula.idJornada WHERE Matricula.idPersona = ?;";
        }
        array_push($parametros, $idPersona);
        return $this->ejecutar_sql($sql, $parametros);
    }

    function ejecutar_sql($sql, $parametros){
        $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
        if(is_null($respuesta[0])||$respuesta[0]==0){
           return false;
        }else{
            return $respuesta;
        }
    }
}