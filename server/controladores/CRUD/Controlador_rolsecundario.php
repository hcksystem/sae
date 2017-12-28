<?php
include_once('../controladores/Controlador_Base.php');
include_once('../entidades/CRUD/RolSecundario.php');
class Controlador_rolsecundario extends Controlador_Base
{
   function crear($args)
   {
      $rolsecundario = new RolSecundario($args["id"],$args["idPersona"],$args["idRol"]);
      $sql = "INSERT INTO RolSecundario (idPersona,idRol,) VALUES (?,?,);";
      $parametros = array($rolsecundario->idPersona,$rolsecundario->idRol);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar($args)
   {
      $rolsecundario = new RolSecundario($args["id"],$args["idPersona"],$args["idRol"]);
      $parametros = array($rolsecundario->idPersona,$rolsecundario->idRol,$rolsecundario->id);
      $sql = "UPDATE RolSecundario SET idPersona = ?,idRol = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function borrar($args)
   {
      $id = $args["id"];
      $parametros = array($id);
      $sql = "DELETE FROM RolSecundario WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function leer($args)
   {
      $id = $args["id"];
      if ($id==""){
         $sql = "SELECT * FROM RolSecundario;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM RolSecundario WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($args)
   {
      $pagina = $args["pagina"];
      $registrosPorPagina = $args["registros_por_pagina"];
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM RolSecundario LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($args)
   {
      $registrosPorPagina = $args["registros_por_pagina"];
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM RolSecundario;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado($args)
   {
      $nombreColumna = $args["columna"];
      $tipoFiltro = $args["tipo_filtro"];
      $filtro = $args["filtro"];
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM RolSecundario WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM RolSecundario WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM RolSecundario WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM RolSecundario WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}