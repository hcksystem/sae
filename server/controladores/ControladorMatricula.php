<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/Matricula.php');
class ControladorMatricula extends ControladorBase
{
   function crear(Matricula $matricula)
   {
      $sql = "INSERT INTO Matricula (codigo,fecha,idPeriodoLectivo,idPersona,idCarrera,numeroMatricula,folio,idJornada) VALUES (?,?,?,?,?,?,?,?);";
      $parametros = array($matricula->codigo,$matricula->fecha,$matricula->idPeriodoLectivo,$matricula->idPersona,$matricula->idCarrera,$matricula->numeroMatricula,$matricula->folio,$matricula->idJornada);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Matricula $matricula)
   {
      $parametros = array($matricula->codigo,$matricula->fecha,$matricula->idPeriodoLectivo,$matricula->idPersona,$matricula->idCarrera,$matricula->numeroMatricula,$matricula->folio,$matricula->idJornada,$matricula->id);
      $sql = "UPDATE Matricula SET codigo = ?,fecha = ?,idPeriodoLectivo = ?,idPersona = ?,idCarrera = ?,numeroMatricula = ?,folio = ?,idJornada = ? WHERE id = ?;";
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
      $sql = "DELETE FROM Matricula WHERE id = ?;";
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
         $sql = "SELECT * FROM Matricula;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Matricula WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM Matricula LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM Matricula;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Matricula WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Matricula WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Matricula WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Matricula WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}