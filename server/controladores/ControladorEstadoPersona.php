<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/EstadoPersona.php');
class ControladorEstadoPersona extends ControladorBase
{
   function crear(EstadoPersona $estadopersona)
   {
      $sql = "INSERT INTO EstadoPersona (idPersona,datosCompletos,edicionDeDatos,encuestaFactoresAsociados) VALUES (?,?,?,?);";
      $parametros = array($estadopersona->idPersona,$estadopersona->datosCompletos,$estadopersona->edicionDeDatos,$estadopersona->encuestaFactoresAsociados);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(EstadoPersona $estadopersona)
   {
      $parametros = array($estadopersona->idPersona,$estadopersona->datosCompletos,$estadopersona->edicionDeDatos,$estadopersona->encuestaFactoresAsociados,$estadopersona->id);
      $sql = "UPDATE EstadoPersona SET idPersona = ?,datosCompletos = ?,edicionDeDatos = ?,encuestaFactoresAsociados = ? WHERE id = ?;";
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
      $sql = "DELETE FROM EstadoPersona WHERE id = ?;";
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
         $sql = "SELECT * FROM EstadoPersona;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM EstadoPersona WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM EstadoPersona LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM EstadoPersona;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM EstadoPersona WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM EstadoPersona WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM EstadoPersona WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM EstadoPersona WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}