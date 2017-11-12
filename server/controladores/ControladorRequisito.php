<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/Requisito.php');
class ControladorRequisito extends ControladorBase
{
   function crear(Requisito $requisito)
   {
      $sql = "INSERT INTO Requisito (idAsignaturaDependiente,idAsignaturaIndependiente,idTipoRequisito) VALUES ('$requisito->idAsignaturaDependiente','$requisito->idAsignaturaIndependiente','$requisito->idTipoRequisito');";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(Requisito $requisito)
   {
      $sql = "UPDATE Requisito SET idAsignaturaDependiente = '$requisito->idAsignaturaDependiente',idAsignaturaIndependiente = '$requisito->idAsignaturaIndependiente',idTipoRequisito = '$requisito->idTipoRequisito' WHERE id = $requisito->id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $sql = "DELETE FROM Requisito WHERE id = $id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Requisito;";
      }else{
         $sql = "SELECT * FROM Requisito WHERE id = $id;";
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
      $sql ="SELECT * FROM Requisito LIMIT $desde,$registrosPorPagina;";
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
            $sql = "SELECT * FROM Requisito WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM Requisito WHERE $nombreColumna = '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Requisito WHERE $nombreColumna = '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Requisito WHERE $nombreColumna = '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}