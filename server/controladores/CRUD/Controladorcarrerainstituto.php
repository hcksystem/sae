<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/CarreraInstituto.php');
class Controladorcarrerainstituto extends ControladorBase
{
   function crear(CarreraInstituto $carrerainstituto)
   {
      $sql = "INSERT INTO CarreraInstituto (idCarrera,idInstituto,) VALUES (?,?,);";
      $parametros = array($carrerainstituto->idCarrera,$carrerainstituto->idInstituto);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(CarreraInstituto $carrerainstituto)
   {
      $parametros = array($carrerainstituto->idCarrera,$carrerainstituto->idInstituto,$carrerainstituto->id);
      $sql = "UPDATE CarreraInstituto SET idCarrera = ?,idInstituto = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM CarreraInstituto WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM CarreraInstituto;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM CarreraInstituto WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM CarreraInstituto LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM CarreraInstituto;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM CarreraInstituto WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM CarreraInstituto WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM CarreraInstituto WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM CarreraInstituto WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}