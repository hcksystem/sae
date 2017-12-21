<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/FotoPerfil.php');
class Controladorfotoperfil extends ControladorBase
{
   function crear(FotoPerfil $fotoperfil)
   {
      $sql = "INSERT INTO FotoPerfil (idPersona,) VALUES (?,);";
      $parametros = array($fotoperfil->idPersona);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(FotoPerfil $fotoperfil)
   {
      $parametros = array($fotoperfil->idPersona,$fotoperfil->id);
      $sql = "UPDATE FotoPerfil SET idPersona = ? WHERE id = ?;";
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
      $sql = "DELETE FROM FotoPerfil WHERE id = ?;";
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
         $sql = "SELECT * FROM FotoPerfil;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM FotoPerfil WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM FotoPerfil LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM FotoPerfil;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM FotoPerfil WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM FotoPerfil WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM FotoPerfil WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM FotoPerfil WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}