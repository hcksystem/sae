<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/Ubicacion.php');
class ControladorUbicacion extends ControladorBase
{
   function crear(Ubicacion $ubicacion)
   {
      $sql = "INSERT INTO Ubicacion (codigo,descripcion,codigoPadre) VALUES (?,?,?);";
      $parametros = array($ubicacion->codigo,$ubicacion->descripcion,$ubicacion->codigoPadre);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function actualizar(Ubicacion $ubicacion)
   {
      $parametros = array($ubicacion->codigo,$ubicacion->descripcion,$ubicacion->codigoPadre,$ubicacion->id);
      $sql = "UPDATE Ubicacion SET codigo = ?,descripcion = ?,codigoPadre = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM Ubicacion WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Ubicacion;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Ubicacion WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM Ubicacion LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM Ubicacion;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Ubicacion WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Ubicacion WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Ubicacion WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Ubicacion WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}