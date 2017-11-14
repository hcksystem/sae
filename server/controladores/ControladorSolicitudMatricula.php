<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/SolicitudMatricula.php');
class ControladorSolicitudMatricula extends ControladorBase
{
   function crear(SolicitudMatricula $solicitudmatricula)
   {
      $sql = "INSERT INTO SolicitudMatricula (codigo,fecha,idPeriodoLectivo,idEstadoSolicitud,idPersona,idCarrera) VALUES (?,?,?,?,?,?);";
      $parametros = array($solicitudmatricula->codigo,$solicitudmatricula->fecha,$solicitudmatricula->idPeriodoLectivo,$solicitudmatricula->idEstadoSolicitud,$solicitudmatricula->idPersona,$solicitudmatricula->idCarrera);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(SolicitudMatricula $solicitudmatricula)
   {
      $parametros = array($solicitudmatricula->codigo,$solicitudmatricula->fecha,$solicitudmatricula->idPeriodoLectivo,$solicitudmatricula->idEstadoSolicitud,$solicitudmatricula->idPersona,$solicitudmatricula->idCarrera,$solicitudmatricula->id);
      $sql = "UPDATE SolicitudMatricula SET codigo = ?,fecha = ?,idPeriodoLectivo = ?,idEstadoSolicitud = ?,idPersona = ?,idCarrera = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM SolicitudMatricula WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM SolicitudMatricula;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM SolicitudMatricula WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM SolicitudMatricula LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM SolicitudMatricula;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $sql = "SELECT * FROM SolicitudMatricula WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM SolicitudMatricula WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM SolicitudMatricula WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM SolicitudMatricula WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}