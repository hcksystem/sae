<?php
namespace CRUD\CONTROLADORES;
include_once('../controladores/ControladorBase.php');
include_once('../entidades/SolicitudMatricula.php');
class ControladorSolicitudMatricula extends ControladorBase
{
   function crear(SolicitudMatricula $solicitudmatricula)
   {
      $sql = "INSERT INTO SolicitudMatricula (codigo,fecha,idPeriodoLectivo,idEstadoSolicitud,idPersona,idCarrera) VALUES ('$solicitudmatricula->codigo','$solicitudmatricula->fecha','$solicitudmatricula->idPeriodoLectivo','$solicitudmatricula->idEstadoSolicitud','$solicitudmatricula->idPersona','$solicitudmatricula->idCarrera');";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(SolicitudMatricula $solicitudmatricula)
   {
      $sql = "UPDATE SolicitudMatricula SET codigo = '$solicitudmatricula->codigo',fecha = '$solicitudmatricula->fecha',idPeriodoLectivo = '$solicitudmatricula->idPeriodoLectivo',idEstadoSolicitud = '$solicitudmatricula->idEstadoSolicitud',idPersona = '$solicitudmatricula->idPersona',idCarrera = '$solicitudmatricula->idCarrera' WHERE id = $solicitudmatricula->id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $sql = "DELETE FROM SolicitudMatricula WHERE id = $id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM SolicitudMatricula;";
      }else{
         $sql = "SELECT * FROM SolicitudMatricula WHERE id = $id;";
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
      $sql ="SELECT * FROM SolicitudMatricula LIMIT $desde,$registrosPorPagina;";
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
            $sql = "SELECT * FROM SolicitudMatricula WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM SolicitudMatricula WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM SolicitudMatricula WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM SolicitudMatricula WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}