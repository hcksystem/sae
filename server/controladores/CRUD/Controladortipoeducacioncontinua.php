<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/TipoEducacionContinua.php');
class Controladortipoeducacioncontinua extends ControladorBase
{
   function crear(TipoEducacionContinua $tipoeducacioncontinua)
   {
      $sql = "INSERT INTO TipoEducacionContinua (descripcion,) VALUES (?,);";
      $parametros = array($tipoeducacioncontinua->descripcion);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(TipoEducacionContinua $tipoeducacioncontinua)
   {
      $parametros = array($tipoeducacioncontinua->descripcion,$tipoeducacioncontinua->id);
      $sql = "UPDATE TipoEducacionContinua SET descripcion = ? WHERE id = ?;";
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
      $sql = "DELETE FROM TipoEducacionContinua WHERE id = ?;";
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
         $sql = "SELECT * FROM TipoEducacionContinua;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM TipoEducacionContinua WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM TipoEducacionContinua LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM TipoEducacionContinua;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM TipoEducacionContinua WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM TipoEducacionContinua WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM TipoEducacionContinua WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM TipoEducacionContinua WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}