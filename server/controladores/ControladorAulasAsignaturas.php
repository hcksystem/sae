<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/AulasAsignaturas.php');
class ControladorAulasAsignaturas extends ControladorBase
{
   function crear(AulasAsignaturas $aulasasignaturas)
   {
      $sql = "INSERT INTO AulasAsignaturas (idAula,idDocenteAsignatura) VALUES (?,?);";
      $parametros = array($aulasasignaturas->idAula,$aulasasignaturas->idDocenteAsignatura);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(AulasAsignaturas $aulasasignaturas)
   {
      $parametros = array($aulasasignaturas->idAula,$aulasasignaturas->idDocenteAsignatura,$aulasasignaturas->id);
      $sql = "UPDATE AulasAsignaturas SET idAula = ?,idDocenteAsignatura = ? WHERE id = ?;";
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
      $sql = "DELETE FROM AulasAsignaturas WHERE id = ?;";
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
         $sql = "SELECT * FROM AulasAsignaturas;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM AulasAsignaturas WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM AulasAsignaturas LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM AulasAsignaturas;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM AulasAsignaturas WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM AulasAsignaturas WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM AulasAsignaturas WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM AulasAsignaturas WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}