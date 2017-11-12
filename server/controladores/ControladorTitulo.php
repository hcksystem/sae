<?php
namespace CRUD\CONTROLADORES;

include_once('../controladores/ControladorBase.php');
include_once('../entidades/Titulo.php');

use CRUD\ENTIDADES\Titulo;

class ControladorTitulo extends ControladorBase
{
   function crear(Titulo $titulo)
   {
      $sql = "INSERT INTO Titulo (idPersona,idInstitucion,codigoRegistro,idNivelTitulo) VALUES ('$titulo->idPersona','$titulo->idInstitucion','$titulo->codigoRegistro','$titulo->idNivelTitulo');";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(Titulo $titulo)
   {
      $sql = "UPDATE Titulo SET idPersona = '$titulo->idPersona',idInstitucion = '$titulo->idInstitucion',codigoRegistro = '$titulo->codigoRegistro',idNivelTitulo = '$titulo->idNivelTitulo' WHERE id = $titulo->id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $sql = "DELETE FROM Titulo WHERE id = $id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Titulo;";
      }else{
         $sql = "SELECT * FROM Titulo WHERE id = $id;";
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
      $sql ="SELECT * FROM Titulo LIMIT $desde,$registrosPorPagina;";
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
            $sql = "SELECT * FROM Titulo WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM Titulo WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Titulo WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Titulo WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}