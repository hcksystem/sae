<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Instituto.php');
class Controladorinstituto extends ControladorBase
{
   function crear(Instituto $instituto)
   {
      $sql = "INSERT INTO Instituto (descripcion,rector,vicerector,color,) VALUES (?,?,?,?,);";
      $parametros = array($instituto->descripcion,$instituto->rector,$instituto->vicerector,$instituto->color);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Instituto $instituto)
   {
      $parametros = array($instituto->descripcion,$instituto->rector,$instituto->vicerector,$instituto->color,$instituto->id);
      $sql = "UPDATE Instituto SET descripcion = ?,rector = ?,vicerector = ?,color = ? WHERE id = ?;";
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
      $sql = "DELETE FROM Instituto WHERE id = ?;";
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
         $sql = "SELECT * FROM Instituto;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Instituto WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Instituto LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Instituto;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Instituto WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Instituto WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Instituto WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Instituto WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}