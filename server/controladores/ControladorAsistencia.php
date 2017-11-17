<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/Asistencia.php');
class ControladorAsistencia extends ControladorBase
{
   function crear(Asistencia $asistencia)
   {
      $sql = "INSERT INTO Asistencia (idMatriculaAsignatura,fecha,horas) VALUES (?,?,?);";
      $parametros = array($asistencia->idMatriculaAsignatura,$asistencia->fecha,$asistencia->horas);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function actualizar(Asistencia $asistencia)
   {
      $parametros = array($asistencia->idMatriculaAsignatura,$asistencia->fecha,$asistencia->horas,$asistencia->id);
      $sql = "UPDATE Asistencia SET idMatriculaAsignatura = ?,fecha = ?,horas = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM Asistencia WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Asistencia;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Asistencia WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM Asistencia LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM Asistencia;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Asistencia WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Asistencia WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Asistencia WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Asistencia WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}