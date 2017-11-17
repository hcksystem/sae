<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/Institucion.php');
class ControladorInstitucion extends ControladorBase
{
   function crear(Institucion $institucion)
   {
      $sql = "INSERT INTO Institucion (nombre,idUbicacion,tipo) VALUES (?,?,?);";
      $parametros = array($institucion->nombre,$institucion->idUbicacion,$institucion->tipo);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function actualizar(Institucion $institucion)
   {
      $parametros = array($institucion->nombre,$institucion->idUbicacion,$institucion->tipo,$institucion->id);
      $sql = "UPDATE Institucion SET nombre = ?,idUbicacion = ?,tipo = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM Institucion WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Institucion;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Institucion WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM Institucion LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM Institucion;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Institucion WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Institucion WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Institucion WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Institucion WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}