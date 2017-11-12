<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/EstadoPersona.php');
class ControladorEstadoPersona extends ControladorBase
{
   function crear(EstadoPersona $estadopersona)
   {
      $sql = "INSERT INTO EstadoPersona (idPersona,datosCompletos,edicionDeDatos,encuestaFactoresAsociados) VALUES ('$estadopersona->idPersona','$estadopersona->datosCompletos','$estadopersona->edicionDeDatos','$estadopersona->encuestaFactoresAsociados');";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(EstadoPersona $estadopersona)
   {
      $sql = "UPDATE EstadoPersona SET idPersona = '$estadopersona->idPersona',datosCompletos = '$estadopersona->datosCompletos',edicionDeDatos = '$estadopersona->edicionDeDatos',encuestaFactoresAsociados = '$estadopersona->encuestaFactoresAsociados' WHERE id = $estadopersona->id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $sql = "DELETE FROM EstadoPersona WHERE id = $id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM EstadoPersona;";
      }else{
         $sql = "SELECT * FROM EstadoPersona WHERE id = $id;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM EstadoPersona LIMIT $desde,$registrosPorPagina;";
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
            $sql = "SELECT * FROM EstadoPersona WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM EstadoPersona WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM EstadoPersona WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM EstadoPersona WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}