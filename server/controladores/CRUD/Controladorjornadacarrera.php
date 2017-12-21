<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/JornadaCarrera.php');
class Controladorjornadacarrera extends ControladorBase
{
   function crear(JornadaCarrera $jornadacarrera)
   {
      $sql = "INSERT INTO JornadaCarrera (idJornada,idCarrera,) VALUES (?,?,);";
      $parametros = array($jornadacarrera->idJornada,$jornadacarrera->idCarrera);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(JornadaCarrera $jornadacarrera)
   {
      $parametros = array($jornadacarrera->idJornada,$jornadacarrera->idCarrera,$jornadacarrera->id);
      $sql = "UPDATE JornadaCarrera SET idJornada = ?,idCarrera = ? WHERE id = ?;";
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
      $sql = "DELETE FROM JornadaCarrera WHERE id = ?;";
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
         $sql = "SELECT * FROM JornadaCarrera;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM JornadaCarrera WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM JornadaCarrera LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM JornadaCarrera;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM JornadaCarrera WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM JornadaCarrera WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM JornadaCarrera WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM JornadaCarrera WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}