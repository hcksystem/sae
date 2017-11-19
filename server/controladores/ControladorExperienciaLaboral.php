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
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(ExperienciaLaboral $experiencialaboral)
   {
      $parametros = array($experiencialaboral->idPersona,$experiencialaboral->fechaInicio,$experiencialaboral->fechaFin,$experiencialaboral->descripcionCargo,$experiencialaboral->descripcionFunciones,$experiencialaboral->nombreEmpresa,$experiencialaboral->idMotivoSalida,$experiencialaboral->id);
      $sql = "UPDATE ExperienciaLaboral SET idPersona = ?,fechaInicio = ?,fechaFin = ?,descripcionCargo = ?,descripcionFunciones = ?,nombreEmpresa = ?,idMotivoSalida = ? WHERE id = ?;";
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
      $sql = "DELETE FROM ExperienciaLaboral WHERE id = ?;";
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
         $sql = "SELECT * FROM ExperienciaLaboral;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM ExperienciaLaboral WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM ExperienciaLaboral LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM ExperienciaLaboral;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM ExperienciaLaboral WHERE $nombreColumna = ?;";
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
      return $respuesta;
   }
}