<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/JornadaCarrera.php');
class ControladorJornadaCarrera extends ControladorBase
{
   function crear(JornadaCarrera $jornadacarrera)
   {
      $sql = "INSERT INTO JornadaCarrera (idJornada,idCarrera) VALUES (?,?);";
      $parametros = array($jornadacarrera->idJornada,$jornadacarrera->idCarrera);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(JornadaCarrera $jornadacarrera)
   {
      $parametros = array($jornadacarrera->idJornada,$jornadacarrera->idCarrera,$jornadacarrera->id);
      $sql = "UPDATE JornadaCarrera SET idJornada = '$jornadacarrera->?',idCarrera = '$jornadacarrera->?' WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM JornadaCarrera WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
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
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM JornadaCarrera LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM JornadaCarrera;";
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
            $sql = "SELECT * FROM JornadaCarrera WHERE $nombreColumna = '$filtro';";
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
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}