<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/Institucion.php');
class ControladorInstitucion extends ControladorBase
{
   function crear(Institucion $institucion)
   {
      $sql = "INSERT INTO Institucion (nombre,idUbicacion,tipo) VALUES ('$institucion->nombre','$institucion->idUbicacion','$institucion->tipo');";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(Institucion $institucion)
   {
      $sql = "UPDATE Institucion SET nombre = '$institucion->nombre',idUbicacion = '$institucion->idUbicacion',tipo = '$institucion->tipo' WHERE id = $institucion->id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $sql = "DELETE FROM Institucion WHERE id = $id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Institucion;";
      }else{
         $sql = "SELECT * FROM Institucion WHERE id = $id;";
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
      $sql ="SELECT * FROM Institucion LIMIT $desde,$registrosPorPagina;";
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
            $sql = "SELECT * FROM Institucion WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM Institucion WHERE $nombreColumna = '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Institucion WHERE $nombreColumna = '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Institucion WHERE $nombreColumna = '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}