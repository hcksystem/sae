<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/RolSecundario.php');
class ControladorRolSecundario extends ControladorBase
{
   function crear(RolSecundario $rolsecundario)
   {
      $sql = "INSERT INTO RolSecundario (idPersona,idRol,idCarrera) VALUES (?,?,?);";
      $parametros = array($rolsecundario->idPersona,$rolsecundario->idRol,$rolsecundario->idCarrera);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(RolSecundario $rolsecundario)
   {
      $parametros = array($rolsecundario->idPersona,$rolsecundario->idRol,$rolsecundario->idCarrera,$rolsecundario->id);
      $sql = "UPDATE RolSecundario SET idPersona = ?,idRol = ?,idCarrera = ? WHERE id = ?;";
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
      $sql = "DELETE FROM RolSecundario WHERE id = ?;";
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
         $sql = "SELECT * FROM RolSecundario;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM RolSecundario WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM RolSecundario LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM RolSecundario;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM RolSecundario WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM RolSecundario WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM RolSecundario WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM RolSecundario WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}