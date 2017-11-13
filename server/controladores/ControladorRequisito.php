<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/Requisito.php');
class ControladorRequisito extends ControladorBase
{
   function crear(Requisito $requisito)
   {
      $sql = "INSERT INTO Requisito (idAsignaturaDependiente,idAsignaturaIndependiente,idTipoRequisito) VALUES (?,?,?);";
      $parametros = array($requisito->idAsignaturaDependiente,$requisito->idAsignaturaIndependiente,$requisito->idTipoRequisito);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(Requisito $requisito)
   {
      $parametros = array($requisito->idAsignaturaDependiente,$requisito->idAsignaturaIndependiente,$requisito->idTipoRequisito,$requisito->id);
      $sql = "UPDATE Requisito SET idAsignaturaDependiente = ?,idAsignaturaIndependiente = ?,idTipoRequisito = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM Requisito WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
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
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM Requisito LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM Requisito;";
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
            $sql = "SELECT * FROM Requisito WHERE $nombreColumna = '$filtro';";
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
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}