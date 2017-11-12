<?php
namespace CRUD\CONTROLADORES;

include_once('../controladores/ControladorBase.php');
include_once('../entidades/Asignatura.php');

use CRUD\ENTIDADES\Asignatura;

class ControladorAsignatura extends ControladorBase
{
   function crear(Asignatura $asignatura)
   {
      $sql = "INSERT INTO Asignatura (idMalla,codigo,nombre,nivel,idDocumentoPea,horasSemana,horasPractica,horasDocente,horasAutonomas) VALUES ('$asignatura->idMalla','$asignatura->codigo','$asignatura->nombre','$asignatura->nivel','$asignatura->idDocumentoPea','$asignatura->horasSemana','$asignatura->horasPractica','$asignatura->horasDocente','$asignatura->horasAutonomas');";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(Asignatura $asignatura)
   {
      $sql = "UPDATE Asignatura SET idMalla = '$asignatura->idMalla',codigo = '$asignatura->codigo',nombre = '$asignatura->nombre',nivel = '$asignatura->nivel',idDocumentoPea = '$asignatura->idDocumentoPea',horasSemana = '$asignatura->horasSemana',horasPractica = '$asignatura->horasPractica',horasDocente = '$asignatura->horasDocente',horasAutonomas = '$asignatura->horasAutonomas' WHERE id = $asignatura->id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $sql = "DELETE FROM Asignatura WHERE id = $id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Asignatura;";
      }else{
         $sql = "SELECT * FROM Asignatura WHERE id = $id;";
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
      $sql ="SELECT * FROM Asignatura LIMIT $desde,$registrosPorPagina;";
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
            $sql = "SELECT * FROM Asignatura WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM Asignatura WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Asignatura WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Asignatura WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}