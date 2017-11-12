<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/Ocupacion.php');
class ControladorOcupacion extends ControladorBase
{
   function crear(Ocupacion $ocupacion)
   {
      $sql = "INSERT INTO Ocupacion (descripcion) VALUES ('$ocupacion->descripcion');";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(Ocupacion $ocupacion)
   {
      $sql = "UPDATE Ocupacion SET descripcion = '$ocupacion->descripcion' WHERE id = $ocupacion->id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $sql = "DELETE FROM Ocupacion WHERE id = $id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Ocupacion;";
      }else{
         $sql = "SELECT * FROM Ocupacion WHERE id = $id;";
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
      $sql ="SELECT * FROM Ocupacion LIMIT $desde,$registrosPorPagina;";
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
            $sql = "SELECT * FROM Ocupacion WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM Ocupacion WHERE $nombreColumna = '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Ocupacion WHERE $nombreColumna = '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Ocupacion WHERE $nombreColumna = '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}