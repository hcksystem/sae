<?php
namespace CRUD\CONTROLADORES;
include_once('../controladores/ControladorBase.php');
include_once('../entidades/Matricula.php');
class ControladorMatricula extends ControladorBase
{
   function crear(Matricula $matricula)
   {
      $sql = "INSERT INTO Matricula (codigo,fecha,idPeriodoLectivo,idPersona,idCarrera,numeroMatricula,folio,idJornada) VALUES ('$matricula->codigo','$matricula->fecha','$matricula->idPeriodoLectivo','$matricula->idPersona','$matricula->idCarrera','$matricula->numeroMatricula','$matricula->folio','$matricula->idJornada');";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(Matricula $matricula)
   {
      $sql = "UPDATE Matricula SET codigo = '$matricula->codigo',fecha = '$matricula->fecha',idPeriodoLectivo = '$matricula->idPeriodoLectivo',idPersona = '$matricula->idPersona',idCarrera = '$matricula->idCarrera',numeroMatricula = '$matricula->numeroMatricula',folio = '$matricula->folio',idJornada = '$matricula->idJornada' WHERE id = $matricula->id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $sql = "DELETE FROM Matricula WHERE id = $id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Matricula;";
      }else{
         $sql = "SELECT * FROM Matricula WHERE id = $id;";
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
      $sql ="SELECT * FROM Matricula LIMIT $desde,$registrosPorPagina;";
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
            $sql = "SELECT * FROM Matricula WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM Matricula WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Matricula WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Matricula WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}