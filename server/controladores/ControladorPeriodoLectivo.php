<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/PeriodoLectivo.php');
class ControladorPeriodoLectivo extends ControladorBase
{
   function crear(PeriodoLectivo $periodolectivo)
   {
      $sql = "INSERT INTO PeriodoLectivo (descripcion,fechaInicio,fechaFin,matriculable,codigo) VALUES (?,?,?,?,?);";
      $parametros = array($periodolectivo->descripcion,$periodolectivo->fechaInicio,$periodolectivo->fechaFin,$periodolectivo->matriculable,$periodolectivo->codigo);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function actualizar(PeriodoLectivo $periodolectivo)
   {
      $parametros = array($periodolectivo->descripcion,$periodolectivo->fechaInicio,$periodolectivo->fechaFin,$periodolectivo->matriculable,$periodolectivo->codigo,$periodolectivo->id);
      $sql = "UPDATE PeriodoLectivo SET descripcion = ?,fechaInicio = ?,fechaFin = ?,matriculable = ?,codigo = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM PeriodoLectivo WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM PeriodoLectivo;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM PeriodoLectivo WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM PeriodoLectivo LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM PeriodoLectivo;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM PeriodoLectivo WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM PeriodoLectivo WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM PeriodoLectivo WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM PeriodoLectivo WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}