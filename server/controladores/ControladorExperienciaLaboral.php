<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/ExperienciaLaboral.php');
class ControladorExperienciaLaboral extends ControladorBase
{
   function crear(ExperienciaLaboral $experiencialaboral)
   {
      $sql = "INSERT INTO ExperienciaLaboral (idPersona,fechaInicio,fechaFin,descripcionCargo,descripcionFunciones,nombreEmpresa,idMotivoSalida) VALUES ('$experiencialaboral->idPersona','$experiencialaboral->fechaInicio','$experiencialaboral->fechaFin','$experiencialaboral->descripcionCargo','$experiencialaboral->descripcionFunciones','$experiencialaboral->nombreEmpresa','$experiencialaboral->idMotivoSalida');";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(ExperienciaLaboral $experiencialaboral)
   {
      $sql = "UPDATE ExperienciaLaboral SET idPersona = '$experiencialaboral->idPersona',fechaInicio = '$experiencialaboral->fechaInicio',fechaFin = '$experiencialaboral->fechaFin',descripcionCargo = '$experiencialaboral->descripcionCargo',descripcionFunciones = '$experiencialaboral->descripcionFunciones',nombreEmpresa = '$experiencialaboral->nombreEmpresa',idMotivoSalida = '$experiencialaboral->idMotivoSalida' WHERE id = $experiencialaboral->id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $sql = "DELETE FROM ExperienciaLaboral WHERE id = $id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM ExperienciaLaboral;";
      }else{
         $sql = "SELECT * FROM ExperienciaLaboral WHERE id = $id;";
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
      $sql ="SELECT * FROM ExperienciaLaboral LIMIT $desde,$registrosPorPagina;";
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
            $sql = "SELECT * FROM ExperienciaLaboral WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM ExperienciaLaboral WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM ExperienciaLaboral WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM ExperienciaLaboral WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}