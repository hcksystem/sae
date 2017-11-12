<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/EducacionContinua.php');
class ControladorEducacionContinua extends ControladorBase
{
   function crear(EducacionContinua $educacioncontinua)
   {
      $sql = "INSERT INTO EducacionContinua (descripcion,horas,fechaInicio,fechaFin,idTipoEducacionContinua,lugar) VALUES ('$educacioncontinua->descripcion','$educacioncontinua->horas','$educacioncontinua->fechaInicio','$educacioncontinua->fechaFin','$educacioncontinua->idTipoEducacionContinua','$educacioncontinua->lugar');";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(EducacionContinua $educacioncontinua)
   {
      $sql = "UPDATE EducacionContinua SET descripcion = '$educacioncontinua->descripcion',horas = '$educacioncontinua->horas',fechaInicio = '$educacioncontinua->fechaInicio',fechaFin = '$educacioncontinua->fechaFin',idTipoEducacionContinua = '$educacioncontinua->idTipoEducacionContinua',lugar = '$educacioncontinua->lugar' WHERE id = $educacioncontinua->id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $sql = "DELETE FROM EducacionContinua WHERE id = $id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM EducacionContinua;";
      }else{
         $sql = "SELECT * FROM EducacionContinua WHERE id = $id;";
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
      $sql ="SELECT * FROM EducacionContinua LIMIT $desde,$registrosPorPagina;";
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
            $sql = "SELECT * FROM EducacionContinua WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM EducacionContinua WHERE $nombreColumna = '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM EducacionContinua WHERE $nombreColumna = '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM EducacionContinua WHERE $nombreColumna = '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}