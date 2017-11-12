<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/DatosEstudiante.php');
class ControladorDatosEstudiante extends ControladorBase
{
   function crear(DatosEstudiante $datosestudiante)
   {
      $sql = "INSERT INTO DatosEstudiante (idEstudiante,descripcion,dato) VALUES ('$datosestudiante->idEstudiante','$datosestudiante->descripcion','$datosestudiante->dato');";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(DatosEstudiante $datosestudiante)
   {
      $sql = "UPDATE DatosEstudiante SET idEstudiante = '$datosestudiante->idEstudiante',descripcion = '$datosestudiante->descripcion',dato = '$datosestudiante->dato' WHERE id = $datosestudiante->id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $sql = "DELETE FROM DatosEstudiante WHERE id = $id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM DatosEstudiante;";
      }else{
         $sql = "SELECT * FROM DatosEstudiante WHERE id = $id;";
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
      $sql ="SELECT * FROM DatosEstudiante LIMIT $desde,$registrosPorPagina;";
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
            $sql = "SELECT * FROM DatosEstudiante WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM DatosEstudiante WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM DatosEstudiante WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM DatosEstudiante WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}