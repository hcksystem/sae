<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Titulo.php');
class Controladortitulo extends ControladorBase
{
   function crear(Titulo $titulo)
   {
      $sql = "INSERT INTO Titulo (idPersona,idInstitucion,codigoRegistro,idNivelTitulo,) VALUES (?,?,?,?,);";
      $parametros = array($titulo->idPersona,$titulo->idInstitucion,$titulo->codigoRegistro,$titulo->idNivelTitulo);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Titulo $titulo)
   {
      $parametros = array($titulo->idPersona,$titulo->idInstitucion,$titulo->codigoRegistro,$titulo->idNivelTitulo,$titulo->id);
      $sql = "UPDATE Titulo SET idPersona = ?,idInstitucion = ?,codigoRegistro = ?,idNivelTitulo = ? WHERE id = ?;";
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
      $sql = "DELETE FROM Titulo WHERE id = ?;";
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
         $sql = "SELECT * FROM Titulo;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Titulo WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Titulo LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Titulo;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Titulo WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Titulo WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Titulo WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Titulo WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}