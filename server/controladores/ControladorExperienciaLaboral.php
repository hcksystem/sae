<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/ExperienciaLaboral.php');
class ControladorExperienciaLaboral extends ControladorBase
{
   function crear(ExperienciaLaboral $experiencialaboral)
   {
      $sql = "INSERT INTO ExperienciaLaboral (idPersona,fechaInicio,fechaFin,descripcionCargo,descripcionFunciones,nombreEmpresa,idMotivoSalida) VALUES (?,?,?,?,?,?,?);";
      $parametros = array($experiencialaboral->idPersona,$experiencialaboral->fechaInicio,$experiencialaboral->fechaFin,$experiencialaboral->descripcionCargo,$experiencialaboral->descripcionFunciones,$experiencialaboral->nombreEmpresa,$experiencialaboral->idMotivoSalida);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(ExperienciaLaboral $experiencialaboral)
   {
      $parametros = array($experiencialaboral->idPersona,$experiencialaboral->fechaInicio,$experiencialaboral->fechaFin,$experiencialaboral->descripcionCargo,$experiencialaboral->descripcionFunciones,$experiencialaboral->nombreEmpresa,$experiencialaboral->idMotivoSalida,$experiencialaboral->id);
      $sql = "UPDATE ExperienciaLaboral SET idPersona = ?,fechaInicio = ?,fechaFin = ?,descripcionCargo = ?,descripcionFunciones = ?,nombreEmpresa = ?,idMotivoSalida = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM ExperienciaLaboral WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM ExperienciaLaboral;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM ExperienciaLaboral WHERE id = ?;";
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
      $sql ="SELECT * FROM ExperienciaLaboral LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM ExperienciaLaboral;";
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
            $sql = "SELECT * FROM ExperienciaLaboral WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM ExperienciaLaboral WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM ExperienciaLaboral WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM ExperienciaLaboral WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}