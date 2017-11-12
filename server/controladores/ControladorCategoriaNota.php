<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CategoriaNota.php');
class ControladorCategoriaNota extends ControladorBase
{
   function crear(CategoriaNota $categorianota)
   {
      $sql = "INSERT INTO CategoriaNota (descripcion) VALUES ('$categorianota->descripcion');";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(CategoriaNota $categorianota)
   {
      $sql = "UPDATE CategoriaNota SET descripcion = '$categorianota->descripcion' WHERE id = $categorianota->id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $sql = "DELETE FROM CategoriaNota WHERE id = $id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM CategoriaNota;";
      }else{
         $sql = "SELECT * FROM CategoriaNota WHERE id = $id;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leerPaginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina)+1;
      $sql ="SELECT * FROM CategoriaNota LIMIT $desde,$registrosPorPagina;";
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
            $sql = "SELECT * FROM CategoriaNota WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM CategoriaNota WHERE $nombreColumna = '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM CategoriaNota WHERE $nombreColumna = '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM CategoriaNota WHERE $nombreColumna = '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}