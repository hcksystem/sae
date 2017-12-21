<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Requisito.php');
class Controladorrequisito extends ControladorBase
{
   function crear(Requisito $requisito)
   {
      $sql = "INSERT INTO Requisito (idAsignaturaDependiente,idAsignaturaIndependiente,idTipoRequisito,) VALUES (?,?,?,);";
      $parametros = array($requisito->idAsignaturaDependiente,$requisito->idAsignaturaIndependiente,$requisito->idTipoRequisito);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Requisito $requisito)
   {
      $parametros = array($requisito->idAsignaturaDependiente,$requisito->idAsignaturaIndependiente,$requisito->idTipoRequisito,$requisito->id);
      $sql = "UPDATE Requisito SET idAsignaturaDependiente = ?,idAsignaturaIndependiente = ?,idTipoRequisito = ? WHERE id = ?;";
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
      $sql = "DELETE FROM Requisito WHERE id = ?;";
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
         $sql = "SELECT * FROM Requisito;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Requisito WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Requisito LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Requisito;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Requisito WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Requisito WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Requisito WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Requisito WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}