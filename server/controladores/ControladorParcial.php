<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/Parcial.php');
class ControladorParcial extends ControladorBase
{
   function crear(Parcial $parcial)
   {
      $sql = "INSERT INTO Parcial (descripcion) VALUES (?);";
      $parametros = array($parcial->descripcion);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function actualizar(Parcial $parcial)
   {
      $parametros = array($parcial->descripcion,$parcial->id);
      $sql = "UPDATE Parcial SET descripcion = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM Parcial WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Parcial;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Parcial WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM Parcial LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM Parcial;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Parcial WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Parcial WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Parcial WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Parcial WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}