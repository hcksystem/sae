<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Cuenta.php');
class ControladorCuenta extends ControladorBase
{
   function crear(Cuenta $cuenta)
   {
      $sql = "INSERT INTO Cuenta (nickname,idUsuario,idRol,idPersona,clave) VALUES (?,?,?,?,?);";
      $parametros = array($cuenta->nickname,$cuenta->idUsuario,$cuenta->idRol,$cuenta->idPersona,$cuenta->clave);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Cuenta $cuenta)
   {
      $parametros = array($cuenta->nickname,$cuenta->idUsuario,$cuenta->idRol,$cuenta->idPersona,$cuenta->clave,$cuenta->id);
      $sql = "UPDATE Cuenta SET nickname = ?,idUsuario = ?,idRol = ?,idPersona = ?,clave = ? WHERE id = ?;";
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
      $sql = "DELETE FROM Cuenta WHERE id = ?;";
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
         $sql = "SELECT * FROM Cuenta;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Cuenta WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Cuenta LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Cuenta;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Cuenta WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Cuenta WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Cuenta WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Cuenta WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}