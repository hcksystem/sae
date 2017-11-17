<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/Carrera.php');
class ControladorCarrera extends ControladorBase
{
   function crear(Carrera $carrera)
   {
      $sql = "INSERT INTO Carrera (resolucion,nombre,descripcion,idModalidad,idInstituto,coordinador,siglas) VALUES (?,?,?,?,?,?,?);";
      $parametros = array($carrera->resolucion,$carrera->nombre,$carrera->descripcion,$carrera->idModalidad,$carrera->idInstituto,$carrera->coordinador,$carrera->siglas);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function actualizar(Carrera $carrera)
   {
      $parametros = array($carrera->resolucion,$carrera->nombre,$carrera->descripcion,$carrera->idModalidad,$carrera->idInstituto,$carrera->coordinador,$carrera->siglas,$carrera->id);
      $sql = "UPDATE Carrera SET resolucion = ?,nombre = ?,descripcion = ?,idModalidad = ?,idInstituto = ?,coordinador = ?,siglas = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM Carrera WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Carrera;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Carrera WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM Carrera LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM Carrera;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Carrera WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Carrera WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Carrera WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Carrera WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}