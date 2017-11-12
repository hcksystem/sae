<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/DetalleNotas.php');
class ControladorDetalleNotas extends ControladorBase
{
   function crear(DetalleNotas $detallenotas)
   {
      $sql = "INSERT INTO DetalleNotas (descripcion,nota,idCateogiraNota,idNota) VALUES ('$detallenotas->descripcion','$detallenotas->nota','$detallenotas->idCateogiraNota','$detallenotas->idNota');";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(DetalleNotas $detallenotas)
   {
      $sql = "UPDATE DetalleNotas SET descripcion = '$detallenotas->descripcion',nota = '$detallenotas->nota',idCateogiraNota = '$detallenotas->idCateogiraNota',idNota = '$detallenotas->idNota' WHERE id = $detallenotas->id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $sql = "DELETE FROM DetalleNotas WHERE id = $id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM DetalleNotas;";
      }else{
         $sql = "SELECT * FROM DetalleNotas WHERE id = $id;";
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
      $sql ="SELECT * FROM DetalleNotas LIMIT $desde,$registrosPorPagina;";
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
            $sql = "SELECT * FROM DetalleNotas WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM DetalleNotas WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM DetalleNotas WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM DetalleNotas WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}