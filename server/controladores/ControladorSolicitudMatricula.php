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
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(SolicitudMatricula $solicitudmatricula)
   {
      $parametros = array($solicitudmatricula->codigo,$solicitudmatricula->fecha,$solicitudmatricula->idPeriodoLectivo,$solicitudmatricula->idEstadoSolicitud,$solicitudmatricula->idPersona,$solicitudmatricula->idCarrera,$solicitudmatricula->id);
      $sql = "UPDATE SolicitudMatricula SET codigo = ?,fecha = ?,idPeriodoLectivo = ?,idEstadoSolicitud = ?,idPersona = ?,idCarrera = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM SolicitudMatricula WHERE id = ?;";
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
         $sql = "SELECT * FROM SolicitudMatricula;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM SolicitudMatricula WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM SolicitudMatricula LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM SolicitudMatricula;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM SolicitudMatricula WHERE $nombreColumna = ?;";
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
      return $respuesta;
   }
}