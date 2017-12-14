<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Malla.php');
class ControladorMalla extends ControladorBase
{
   function crear(Malla $malla)
   {
      $sql = "INSERT INTO Malla (fechaMallaInicio,fechaMallaFin,idCarrera,idDocResolucion) VALUES (?,?,?,?);";
      $parametros = array($malla->fechaMallaInicio,$malla->fechaMallaFin,$malla->idCarrera,$malla->idDocResolucion);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Malla $malla)
   {
      $parametros = array($malla->fechaMallaInicio,$malla->fechaMallaFin,$malla->idCarrera,$malla->idDocResolucion,$malla->id);
      $sql = "UPDATE Malla SET fechaMallaInicio = ?,fechaMallaFin = ?,idCarrera = ?,idDocResolucion = ? WHERE id = ?;";
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
      $sql = "DELETE FROM Malla WHERE id = ?;";
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
         $sql = "SELECT * FROM Malla;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Malla WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Malla LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Malla;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Malla WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Malla WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Malla WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Malla WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}