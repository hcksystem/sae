<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/DocenteAsignatura.php');
class ControladorDocenteAsignatura extends ControladorBase
{
   function crear(DocenteAsignatura $docenteasignatura)
   {
      $sql = "INSERT INTO DocenteAsignatura (idDocente,idPeriodoLectivo,idAsignatura,idParalelo) VALUES (?,?,?,?);";
      $parametros = array($docenteasignatura->idDocente,$docenteasignatura->idPeriodoLectivo,$docenteasignatura->idAsignatura,$docenteasignatura->idParalelo);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function actualizar(DocenteAsignatura $docenteasignatura)
   {
      $parametros = array($docenteasignatura->idDocente,$docenteasignatura->idPeriodoLectivo,$docenteasignatura->idAsignatura,$docenteasignatura->idParalelo,$docenteasignatura->id);
      $sql = "UPDATE DocenteAsignatura SET idDocente = ?,idPeriodoLectivo = ?,idAsignatura = ?,idParalelo = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM DocenteAsignatura WHERE id = ?;";
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
         $sql = "SELECT * FROM DocenteAsignatura;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM DocenteAsignatura WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM DocenteAsignatura LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM DocenteAsignatura;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM DocenteAsignatura WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM DocenteAsignatura WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM DocenteAsignatura WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM DocenteAsignatura WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}