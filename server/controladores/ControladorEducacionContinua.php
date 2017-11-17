<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/EducacionContinua.php');
class ControladorEducacionContinua extends ControladorBase
{
   function crear(EducacionContinua $educacioncontinua)
   {
      $sql = "INSERT INTO EducacionContinua (descripcion,horas,fechaInicio,fechaFin,idTipoEducacionContinua,lugar) VALUES (?,?,?,?,?,?);";
      $parametros = array($educacioncontinua->descripcion,$educacioncontinua->horas,$educacioncontinua->fechaInicio,$educacioncontinua->fechaFin,$educacioncontinua->idTipoEducacionContinua,$educacioncontinua->lugar);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function actualizar(EducacionContinua $educacioncontinua)
   {
      $parametros = array($educacioncontinua->descripcion,$educacioncontinua->horas,$educacioncontinua->fechaInicio,$educacioncontinua->fechaFin,$educacioncontinua->idTipoEducacionContinua,$educacioncontinua->lugar,$educacioncontinua->id);
      $sql = "UPDATE EducacionContinua SET descripcion = ?,horas = ?,fechaInicio = ?,fechaFin = ?,idTipoEducacionContinua = ?,lugar = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM EducacionContinua WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM EducacionContinua;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM EducacionContinua WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM EducacionContinua LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM EducacionContinua;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM EducacionContinua WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM EducacionContinua WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM EducacionContinua WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM EducacionContinua WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}