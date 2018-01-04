<?php
include_once('../controladores/Controlador_Base.php');
include_once('../entidades/especificos/DatosMail.php');
class Controlador_destinos_mail extends Controlador_Base
{
   function consultar($args)
   { 
        $nivel = $args["nivel"];
        $idCarrera = $args["idCarrera"];
        $parametros = array();
        $sql = "SELECT DISTINCT identificacion, nombre1, nombre2, apellido1, apellido2, telefonoCelular, telefonoDomicilio, correoElectronicoInstitucional as 'correoElectronico', idGenero, Genero.descripcion as 'genero', Matricula.idCarrera, Carrera.descripcion as 'carrera', Carrera.coordinador as 'coordinadorCarrera', Carrera.idInstituto, Instituto.descripcion as 'instituto', Asignatura.nivel FROM Persona INNER JOIN Genero ON Persona.idGenero = Genero.id INNER JOIN Matricula ON Matricula.idPersona = Persona.id INNER JOIN  Carrera ON Carrera.id = Matricula.idCarrera INNER JOIN Instituto ON Carrera.idInstituto = Instituto.id INNER JOIN MatriculaAsignatura ON MatriculaAsignatura.idMatricula = Matricula.id INNER JOIN Asignatura ON MatriculaAsignatura.idAsignatura = Asignatura.id INNER JOIN PeriodoLectivo ON PeriodoLectivo.id = Matricula.idPeriodoLectivo WHERE PeriodoLectivo.matriculable = 1;";
        if(!($nivel == null)){
            $sql = trim($sql,';');
            $sql = $sql.' AND Asignatura.nivel = ?;';
            array_push($parametros,$nivel);
        }
        if(!($idCarrera == null)){
            $sql = trim($sql,';');
            $sql = $sql.' AND Carrera.id = ?;';
            array_push($parametros,$idCarrera);
        }
        $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
        if(is_null($respuesta[0])||$respuesta[0]==0){
           return false;
        }else{
            return $respuesta;
        }   
   }
}