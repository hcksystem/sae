<?php
include_once('../controladores/Controlador_Base.php');
include_once('../entidades/CRUD/Estudiante.php');
class Controlador_estudiante extends Controlador_Base
{
   function crear($args)
   {
      $estudiante = new Estudiante($args["id"],$args["idPersona"],$args["notaPostulacion"],$args["tituloBachiller"],$args["idTipoInstitucionProcedencia"]);
      $sql = "INSERT INTO Estudiante (idPersona,notaPostulacion,tituloBachiller,idTipoInstitucionProcedencia,) VALUES (?,?,?,?,);";
      $parametros = array($estudiante->idPersona,$estudiante->notaPostulacion,$estudiante->tituloBachiller,$estudiante->idTipoInstitucionProcedencia);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar($args)
   {
      $estudiante = new Estudiante($args["id"],$args["idPersona"],$args["notaPostulacion"],$args["tituloBachiller"],$args["idTipoInstitucionProcedencia"]);
      $parametros = array($estudiante->idPersona,$estudiante->notaPostulacion,$estudiante->tituloBachiller,$estudiante->idTipoInstitucionProcedencia,$estudiante->id);
      $sql = "UPDATE Estudiante SET idPersona = ?,notaPostulacion = ?,tituloBachiller = ?,idTipoInstitucionProcedencia = ? WHERE id = ?;";
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
      $sql = "DELETE FROM Estudiante WHERE id = ?;";
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
         $sql = "SELECT * FROM Estudiante;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Estudiante WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($args)
   {
      $pagina = $args["pagina"];
      $registrosPorPagina = $args["registros_por_pagina"];
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Estudiante LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($args)
   {
      $registrosPorPagina = $args["registros_por_pagina"];
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Estudiante;";
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
            $sql = "SELECT * FROM Estudiante WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Estudiante WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Estudiante WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Estudiante WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}