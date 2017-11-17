<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/Persona.php');
class ControladorPersona extends ControladorBase
{
   function crear(Persona $persona)
   {
      $sql = "INSERT INTO Persona (identificacion,nombre1,nombre2,apellido1,apellido2,fechaNacimiento,telefonoCelular,telefonoDomicilio,correoElectronico,idGenero,idUbicacionDomicilioPais,idUbicacionDomicilioProvincia,idUbicacionDomicilioCanton,idUbicacionDomicilioParroquia,direccionDomicilio,idEstadoCivil,idUbicacionNacimientoPais,idUbicacionNacimientoProvincia,idUbicacionNacimientoCanton,idUbicacionNacimientoParroquia,idIngresos,idEtnia,idTipoSangre,numeroHijos,idOcupacion,carnetConadis,idTipoDiscapacidad,porcentajeDiscapacidad,nombrePadre,paisOrigenPadre,idNivelEstudioPadre,nombreMadre,paisOrigenMadre,idNivelEstudioMadre,foto) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
      $parametros = array($persona->identificacion,$persona->nombre1,$persona->nombre2,$persona->apellido1,$persona->apellido2,$persona->fechaNacimiento,$persona->telefonoCelular,$persona->telefonoDomicilio,$persona->correoElectronico,$persona->idGenero,$persona->idUbicacionDomicilioPais,$persona->idUbicacionDomicilioProvincia,$persona->idUbicacionDomicilioCanton,$persona->idUbicacionDomicilioParroquia,$persona->direccionDomicilio,$persona->idEstadoCivil,$persona->idUbicacionNacimientoPais,$persona->idUbicacionNacimientoProvincia,$persona->idUbicacionNacimientoCanton,$persona->idUbicacionNacimientoParroquia,$persona->idIngresos,$persona->idEtnia,$persona->idTipoSangre,$persona->numeroHijos,$persona->idOcupacion,$persona->carnetConadis,$persona->idTipoDiscapacidad,$persona->porcentajeDiscapacidad,$persona->nombrePadre,$persona->paisOrigenPadre,$persona->idNivelEstudioPadre,$persona->nombreMadre,$persona->paisOrigenMadre,$persona->idNivelEstudioMadre,$persona->foto);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function actualizar(Persona $persona)
   {
      $parametros = array($persona->identificacion,$persona->nombre1,$persona->nombre2,$persona->apellido1,$persona->apellido2,$persona->fechaNacimiento,$persona->telefonoCelular,$persona->telefonoDomicilio,$persona->correoElectronico,$persona->idGenero,$persona->idUbicacionDomicilioPais,$persona->idUbicacionDomicilioProvincia,$persona->idUbicacionDomicilioCanton,$persona->idUbicacionDomicilioParroquia,$persona->direccionDomicilio,$persona->idEstadoCivil,$persona->idUbicacionNacimientoPais,$persona->idUbicacionNacimientoProvincia,$persona->idUbicacionNacimientoCanton,$persona->idUbicacionNacimientoParroquia,$persona->idIngresos,$persona->idEtnia,$persona->idTipoSangre,$persona->numeroHijos,$persona->idOcupacion,$persona->carnetConadis,$persona->idTipoDiscapacidad,$persona->porcentajeDiscapacidad,$persona->nombrePadre,$persona->paisOrigenPadre,$persona->idNivelEstudioPadre,$persona->nombreMadre,$persona->paisOrigenMadre,$persona->idNivelEstudioMadre,$persona->foto,$persona->id);
      $sql = "UPDATE Persona SET identificacion = ?,nombre1 = ?,nombre2 = ?,apellido1 = ?,apellido2 = ?,fechaNacimiento = ?,telefonoCelular = ?,telefonoDomicilio = ?,correoElectronico = ?,idGenero = ?,idUbicacionDomicilioPais = ?,idUbicacionDomicilioProvincia = ?,idUbicacionDomicilioCanton = ?,idUbicacionDomicilioParroquia = ?,direccionDomicilio = ?,idEstadoCivil = ?,idUbicacionNacimientoPais = ?,idUbicacionNacimientoProvincia = ?,idUbicacionNacimientoCanton = ?,idUbicacionNacimientoParroquia = ?,idIngresos = ?,idEtnia = ?,idTipoSangre = ?,numeroHijos = ?,idOcupacion = ?,carnetConadis = ?,idTipoDiscapacidad = ?,porcentajeDiscapacidad = ?,nombrePadre = ?,paisOrigenPadre = ?,idNivelEstudioPadre = ?,nombreMadre = ?,paisOrigenMadre = ?,idNivelEstudioMadre = ?,foto = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM Persona WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Persona;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Persona WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM Persona LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM Persona;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
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