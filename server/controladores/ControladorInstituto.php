<?php
namespace CRUD\CONTROLADORES;

include_once('../controladores/ControladorBase.php');
include_once('../entidades/Instituto.php');

use CRUD\ENTIDADES\Instituto;

class ControladorInstituto extends ControladorBase
{
   function crear(Instituto $instituto)
   {
      $sql = "INSERT INTO Instituto (descripcion,rector,vicerector,color) VALUES ('$instituto->descripcion','$instituto->rector','$instituto->vicerector','$instituto->color');";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(Instituto $instituto)
   {
      $sql = "UPDATE Instituto SET descripcion = '$instituto->descripcion',rector = '$instituto->rector',vicerector = '$instituto->vicerector',color = '$instituto->color' WHERE id = $instituto->id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $sql = "DELETE FROM Instituto WHERE id = $id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Instituto;";
      }else{
         $sql = "SELECT * FROM Instituto WHERE id = $id;";
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
      $sql ="SELECT * FROM Instituto LIMIT $desde,$registrosPorPagina;";
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
            $sql = "SELECT * FROM Instituto WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM Instituto WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Instituto WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Instituto WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}