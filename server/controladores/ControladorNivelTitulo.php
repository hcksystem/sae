<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/NivelTitulo.php');
class ControladorNivelTitulo extends ControladorBase
{
   function crear(NivelTitulo $niveltitulo)
   {
      $sql = "INSERT INTO NivelTitulo (descripcion) VALUES (?);";
      $parametros = array($niveltitulo->descripcion);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function actualizar(NivelTitulo $niveltitulo)
   {
      $parametros = array($niveltitulo->descripcion,$niveltitulo->id);
      $sql = "UPDATE NivelTitulo SET descripcion = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM NivelTitulo WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM NivelTitulo;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM NivelTitulo WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM NivelTitulo LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM NivelTitulo;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM NivelTitulo WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM NivelTitulo WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM NivelTitulo WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM NivelTitulo WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}