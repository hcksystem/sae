<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/Discapacidad.php');
class ControladorDiscapacidad extends ControladorBase
{
   function crear(Discapacidad $discapacidad)
   {
      $sql = "INSERT INTO Discapacidad (idPersona,idTipoDiscapacidad,porcentaje) VALUES (?,?,?);";
      $parametros = array($discapacidad->idPersona,$discapacidad->idTipoDiscapacidad,$discapacidad->porcentaje);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Discapacidad $discapacidad)
   {
      $parametros = array($discapacidad->idPersona,$discapacidad->idTipoDiscapacidad,$discapacidad->porcentaje,$discapacidad->id);
      $sql = "UPDATE Discapacidad SET idPersona = ?,idTipoDiscapacidad = ?,porcentaje = ? WHERE id = ?;";
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
      $sql = "DELETE FROM Discapacidad WHERE id = ?;";
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
         $sql = "SELECT * FROM Discapacidad;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Discapacidad WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM Discapacidad LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM Discapacidad;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Discapacidad WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Discapacidad WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Discapacidad WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Discapacidad WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}