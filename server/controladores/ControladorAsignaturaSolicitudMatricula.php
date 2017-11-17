<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/AsignaturaSolicitudMatricula.php');
class ControladorAsignaturaSolicitudMatricula extends ControladorBase
{
   function crear(AsignaturaSolicitudMatricula $asignaturasolicitudmatricula)
   {
      $sql = "INSERT INTO AsignaturaSolicitudMatricula (idSolicitudMatricula,idAsignatura) VALUES (?,?);";
      $parametros = array($asignaturasolicitudmatricula->idSolicitudMatricula,$asignaturasolicitudmatricula->idAsignatura);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function actualizar(AsignaturaSolicitudMatricula $asignaturasolicitudmatricula)
   {
      $parametros = array($asignaturasolicitudmatricula->idSolicitudMatricula,$asignaturasolicitudmatricula->idAsignatura,$asignaturasolicitudmatricula->id);
      $sql = "UPDATE AsignaturaSolicitudMatricula SET idSolicitudMatricula = ?,idAsignatura = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM AsignaturaSolicitudMatricula WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM AsignaturaSolicitudMatricula;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM AsignaturaSolicitudMatricula WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM AsignaturaSolicitudMatricula LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM AsignaturaSolicitudMatricula;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM AsignaturaSolicitudMatricula WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM AsignaturaSolicitudMatricula WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM AsignaturaSolicitudMatricula WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM AsignaturaSolicitudMatricula WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}