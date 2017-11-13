<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/TipoAula.php');
class ControladorTipoAula extends ControladorBase
{
   function crear(TipoAula $tipoaula)
   {
      $sql = "INSERT INTO TipoAula (descripcion) VALUES (?);";
      $parametros = array($tipoaula->descripcion);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(TipoAula $tipoaula)
   {
      $parametros = array($tipoaula->descripcion,$tipoaula->id);
      $sql = "UPDATE TipoAula SET descripcion = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM TipoAula WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM TipoAula;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM TipoAula WHERE id = ?;";
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
      $sql ="SELECT * FROM TipoAula LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM TipoAula;";
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
            $sql = "SELECT * FROM TipoAula WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM TipoAula WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM TipoAula WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM TipoAula WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}