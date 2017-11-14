<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/DetalleNotas.php');
class ControladorDetalleNotas extends ControladorBase
{
   function crear(DetalleNotas $detallenotas)
   {
      $sql = "INSERT INTO DetalleNotas (descripcion,nota,idCateogiraNota,idNota) VALUES (?,?,?,?);";
      $parametros = array($detallenotas->descripcion,$detallenotas->nota,$detallenotas->idCateogiraNota,$detallenotas->idNota);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(DetalleNotas $detallenotas)
   {
      $parametros = array($detallenotas->descripcion,$detallenotas->nota,$detallenotas->idCateogiraNota,$detallenotas->idNota,$detallenotas->id);
      $sql = "UPDATE DetalleNotas SET descripcion = ?,nota = ?,idCateogiraNota = ?,idNota = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM DetalleNotas WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
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
      $parametros = array($id);
         $sql = "SELECT * FROM DetalleNotas WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM DetalleNotas LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM DetalleNotas;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM DetalleNotas WHERE $nombreColumna = ?;";
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
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}