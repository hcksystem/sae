<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/Enfermedad.php');
class ControladorEnfermedad extends ControladorBase
{
   function crear(Enfermedad $enfermedad)
   {
      $sql = "INSERT INTO Enfermedad (descripcion,observaciones,tratamiento) VALUES (?,?,?);";
      $parametros = array($enfermedad->descripcion,$enfermedad->observaciones,$enfermedad->tratamiento);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(Enfermedad $enfermedad)
   {
      $parametros = array($enfermedad->descripcion,$enfermedad->observaciones,$enfermedad->tratamiento,$enfermedad->id);
      $sql = "UPDATE Enfermedad SET descripcion = ?,observaciones = ?,tratamiento = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM Enfermedad WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Enfermedad;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Enfermedad WHERE id = ?;";
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
      $sql ="SELECT * FROM Enfermedad LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM Enfermedad;";
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
            $sql = "SELECT * FROM Enfermedad WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM Enfermedad WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Enfermedad WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Enfermedad WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}