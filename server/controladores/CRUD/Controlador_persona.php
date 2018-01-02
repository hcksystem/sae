<?php
include_once('../controladores/Controlador_Base.php');
include_once('../entidades/CRUD/Persona.php');
class Controlador_persona extends Controlador_Base
{
   function crear($args)
   {
      $persona = new Persona($args["id"],$args["identificacion"],$args["nombre1"],$args["nombre2"],$args["apellido1"],$args["apellido2"],$args["fechaNacimiento"],$args["telefonoCelular"],$args["telefonoDomicilio"],$args["correoElectronicoInstitucional"],$args["correoElectronicoPersonal"],$args["idGenero"],$args["idUbicacionDomicilioPais"],$args["idUbicacionDomicilioProvincia"],$args["idUbicacionDomicilioCanton"],$args["idUbicacionDomicilioParroquia"],$args["direccionDomicilio"],$args["idEstadoCivil"],$args["idUbicacionNacimientoPais"],$args["idUbicacionNacimientoProvincia"],$args["idUbicacionNacimientoCanton"],$args["idUbicacionNacimientoParroquia"],$args["idIngresos"],$args["idEtnia"],$args["idTipoSangre"],$args["numeroHijos"],$args["idOcupacion"],$args["carnetConadis"],$args["idTipoDiscapacidad"],$args["porcentajeDiscapacidad"],$args["nombrePadre"],$args["paisOrigenPadre"],$args["idNivelEstudioPadre"],$args["nombreMadre"],$args["paisOrigenMadre"],$args["idNivelEstudioMadre"]);
      $sql = "INSERT INTO Persona (identificacion,nombre1,nombre2,apellido1,apellido2,fechaNacimiento,telefonoCelular,telefonoDomicilio,correoElectronicoInstitucional,correoElectronicoPersonal,idGenero,idUbicacionDomicilioPais,idUbicacionDomicilioProvincia,idUbicacionDomicilioCanton,idUbicacionDomicilioParroquia,direccionDomicilio,idEstadoCivil,idUbicacionNacimientoPais,idUbicacionNacimientoProvincia,idUbicacionNacimientoCanton,idUbicacionNacimientoParroquia,idIngresos,idEtnia,idTipoSangre,numeroHijos,idOcupacion,carnetConadis,idTipoDiscapacidad,porcentajeDiscapacidad,nombrePadre,paisOrigenPadre,idNivelEstudioPadre,nombreMadre,paisOrigenMadre,idNivelEstudioMadre) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
      $fechaNacimientoNoSQLTime = strtotime($persona->fechaNacimiento);
      $fechaNacimientoSQLTime = date("Y-m-d H:i:s", $fechaNacimientoNoSQLTime);
      $persona->fechaNacimiento = $fechaNacimientoSQLTime;
      $parametros = array($persona->identificacion,$persona->nombre1,$persona->nombre2,$persona->apellido1,$persona->apellido2,$persona->fechaNacimiento,$persona->telefonoCelular,$persona->telefonoDomicilio,$persona->correoElectronicoInstitucional,$persona->correoElectronicoPersonal,$persona->idGenero,$persona->idUbicacionDomicilioPais,$persona->idUbicacionDomicilioProvincia,$persona->idUbicacionDomicilioCanton,$persona->idUbicacionDomicilioParroquia,$persona->direccionDomicilio,$persona->idEstadoCivil,$persona->idUbicacionNacimientoPais,$persona->idUbicacionNacimientoProvincia,$persona->idUbicacionNacimientoCanton,$persona->idUbicacionNacimientoParroquia,$persona->idIngresos,$persona->idEtnia,$persona->idTipoSangre,$persona->numeroHijos,$persona->idOcupacion,$persona->carnetConadis,$persona->idTipoDiscapacidad,$persona->porcentajeDiscapacidad,$persona->nombrePadre,$persona->paisOrigenPadre,$persona->idNivelEstudioPadre,$persona->nombreMadre,$persona->paisOrigenMadre,$persona->idNivelEstudioMadre);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar($args)
   {
      $persona = new Persona($args["id"],$args["identificacion"],$args["nombre1"],$args["nombre2"],$args["apellido1"],$args["apellido2"],$args["fechaNacimiento"],$args["telefonoCelular"],$args["telefonoDomicilio"],$args["correoElectronicoInstitucional"],$args["correoElectronicoPersonal"],$args["idGenero"],$args["idUbicacionDomicilioPais"],$args["idUbicacionDomicilioProvincia"],$args["idUbicacionDomicilioCanton"],$args["idUbicacionDomicilioParroquia"],$args["direccionDomicilio"],$args["idEstadoCivil"],$args["idUbicacionNacimientoPais"],$args["idUbicacionNacimientoProvincia"],$args["idUbicacionNacimientoCanton"],$args["idUbicacionNacimientoParroquia"],$args["idIngresos"],$args["idEtnia"],$args["idTipoSangre"],$args["numeroHijos"],$args["idOcupacion"],$args["carnetConadis"],$args["idTipoDiscapacidad"],$args["porcentajeDiscapacidad"],$args["nombrePadre"],$args["paisOrigenPadre"],$args["idNivelEstudioPadre"],$args["nombreMadre"],$args["paisOrigenMadre"],$args["idNivelEstudioMadre"]);
      $parametros = array($persona->identificacion,$persona->nombre1,$persona->nombre2,$persona->apellido1,$persona->apellido2,$persona->fechaNacimiento,$persona->telefonoCelular,$persona->telefonoDomicilio,$persona->correoElectronicoInstitucional,$persona->correoElectronicoPersonal,$persona->idGenero,$persona->idUbicacionDomicilioPais,$persona->idUbicacionDomicilioProvincia,$persona->idUbicacionDomicilioCanton,$persona->idUbicacionDomicilioParroquia,$persona->direccionDomicilio,$persona->idEstadoCivil,$persona->idUbicacionNacimientoPais,$persona->idUbicacionNacimientoProvincia,$persona->idUbicacionNacimientoCanton,$persona->idUbicacionNacimientoParroquia,$persona->idIngresos,$persona->idEtnia,$persona->idTipoSangre,$persona->numeroHijos,$persona->idOcupacion,$persona->carnetConadis,$persona->idTipoDiscapacidad,$persona->porcentajeDiscapacidad,$persona->nombrePadre,$persona->paisOrigenPadre,$persona->idNivelEstudioPadre,$persona->nombreMadre,$persona->paisOrigenMadre,$persona->idNivelEstudioMadre,$persona->id);
      $sql = "UPDATE Persona SET identificacion = ?,nombre1 = ?,nombre2 = ?,apellido1 = ?,apellido2 = ?,fechaNacimiento = ?,telefonoCelular = ?,telefonoDomicilio = ?,correoElectronicoInstitucional = ?,correoElectronicoPersonal = ?,idGenero = ?,idUbicacionDomicilioPais = ?,idUbicacionDomicilioProvincia = ?,idUbicacionDomicilioCanton = ?,idUbicacionDomicilioParroquia = ?,direccionDomicilio = ?,idEstadoCivil = ?,idUbicacionNacimientoPais = ?,idUbicacionNacimientoProvincia = ?,idUbicacionNacimientoCanton = ?,idUbicacionNacimientoParroquia = ?,idIngresos = ?,idEtnia = ?,idTipoSangre = ?,numeroHijos = ?,idOcupacion = ?,carnetConadis = ?,idTipoDiscapacidad = ?,porcentajeDiscapacidad = ?,nombrePadre = ?,paisOrigenPadre = ?,idNivelEstudioPadre = ?,nombreMadre = ?,paisOrigenMadre = ?,idNivelEstudioMadre = ? WHERE id = ?;";
      $fechaNacimientoNoSQLTime = strtotime($persona->fechaNacimiento);
      $fechaNacimientoSQLTime = date("Y-m-d H:i:s", $fechaNacimientoNoSQLTime);
      $persona->fechaNacimiento = $fechaNacimientoSQLTime;
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
      $sql = "DELETE FROM Persona WHERE id = ?;";
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
         $sql = "SELECT * FROM Persona;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Persona WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($args)
   {
      $pagina = $args["pagina"];
      $registrosPorPagina = $args["registros_por_pagina"];
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Persona LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($args)
   {
      $registrosPorPagina = $args["registros_por_pagina"];
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Persona;";
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
            $sql = "SELECT * FROM Persona WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Persona WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Persona WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Persona WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}