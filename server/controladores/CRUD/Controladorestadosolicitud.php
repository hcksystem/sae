<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/EstadoSolicitud.php');
class Controladorestadosolicitud extends ControladorBase
{
   function crear(EstadoSolicitud $estadosolicitud)
   {
      $sql = "INSERT INTO EstadoSolicitud (descripcion,) VALUES (?,);";
      $parametros = array($estadosolicitud->descripcion);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(EstadoSolicitud $estadosolicitud)
   {
      $parametros = array($estadosolicitud->descripcion,$estadosolicitud->id);
      $sql = "UPDATE EstadoSolicitud SET descripcion = ? WHERE id = ?;";
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
      $sql = "DELETE FROM EstadoSolicitud WHERE id = ?;";
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
         $sql = "SELECT * FROM EstadoSolicitud;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM EstadoSolicitud WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM EstadoSolicitud LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM EstadoSolicitud;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM EstadoSolicitud WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM EstadoSolicitud WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM EstadoSolicitud WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM EstadoSolicitud WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}