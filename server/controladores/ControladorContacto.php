<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/Contacto.php');
class ControladorContacto extends ControladorBase
{
   function crear(Contacto $contacto)
   {
      $sql = "INSERT INTO Contacto (idPersona,descripcion,contacto) VALUES (?,?,?);";
      $parametros = array($contacto->idPersona,$contacto->descripcion,$contacto->contacto);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function actualizar(Contacto $contacto)
   {
      $parametros = array($contacto->idPersona,$contacto->descripcion,$contacto->contacto,$contacto->id);
      $sql = "UPDATE Contacto SET idPersona = ?,descripcion = ?,contacto = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM Contacto WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Contacto;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Contacto WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM Contacto LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM Contacto;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Contacto WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Contacto WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Contacto WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Contacto WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}