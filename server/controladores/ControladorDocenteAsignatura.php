<?php
namespace CRUD\CONTROLADORES;

include_once('../controladores/ControladorBase.php');
include_once('../entidades/DocenteAsignatura.php');

use CRUD\ENTIDADES\DocenteAsignatura;

class ControladorDocenteAsignatura extends ControladorBase
{
   function crear(DocenteAsignatura $docenteasignatura)
   {
      $sql = "INSERT INTO DocenteAsignatura (idDocente,idPeriodoLectivo,idAsignatura,idParalelo) VALUES ('$docenteasignatura->idDocente','$docenteasignatura->idPeriodoLectivo','$docenteasignatura->idAsignatura','$docenteasignatura->idParalelo');";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(DocenteAsignatura $docenteasignatura)
   {
      $sql = "UPDATE DocenteAsignatura SET idDocente = '$docenteasignatura->idDocente',idPeriodoLectivo = '$docenteasignatura->idPeriodoLectivo',idAsignatura = '$docenteasignatura->idAsignatura',idParalelo = '$docenteasignatura->idParalelo' WHERE id = $docenteasignatura->id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $sql = "DELETE FROM DocenteAsignatura WHERE id = $id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM DocenteAsignatura;";
      }else{
         $sql = "SELECT * FROM DocenteAsignatura WHERE id = $id;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leerPaginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM DocenteAsignatura LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $sql = "SELECT * FROM DocenteAsignatura WHERE $nombreColumna = '$filtro';";
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
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}