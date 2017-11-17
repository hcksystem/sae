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
      return $respuesta;
   }

   function actualizar(Enfermedad $enfermedad)
   {
      $parametros = array($enfermedad->descripcion,$enfermedad->observaciones,$enfermedad->tratamiento,$enfermedad->id);
      $sql = "UPDATE Enfermedad SET descripcion = ?,observaciones = ?,tratamiento = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM Enfermedad WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
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
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM Enfermedad LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM Enfermedad;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Enfermedad WHERE $nombreColumna = ?;";
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
      return $respuesta;
   }
}