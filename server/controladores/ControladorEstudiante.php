<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/Estudiante.php');
class ControladorEstudiante extends ControladorBase
{
   function crear(Estudiante $estudiante)
   {
      $sql = "INSERT INTO Estudiante (idPersona,notaPostulacion,tituloBachiller,idTipoInstitucionProcedencia) VALUES (?,?,?,?);";
      $parametros = array($estudiante->idPersona,$estudiante->notaPostulacion,$estudiante->tituloBachiller,$estudiante->idTipoInstitucionProcedencia);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(Estudiante $estudiante)
   {
      $parametros = array($estudiante->idPersona,$estudiante->notaPostulacion,$estudiante->tituloBachiller,$estudiante->idTipoInstitucionProcedencia,$estudiante->id);
      $sql = "UPDATE Estudiante SET idPersona = ?,notaPostulacion = ?,tituloBachiller = ?,idTipoInstitucionProcedencia = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM Estudiante WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Estudiante;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Estudiante WHERE id = ?;";
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
      $sql ="SELECT * FROM Estudiante LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM Estudiante;";
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
            $parametros = array($filtro);
            $sql = "SELECT * FROM Estudiante WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Estudiante WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Estudiante WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Estudiante WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}