<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/Persona.php');
class ControladorPersona extends ControladorBase
{
   function crear(Persona $persona)
   {
      $sql = "INSERT INTO Persona (identificacion,nombre1,nombre2,apellido1,apellido2,fechaNacimiento,telefonoCelular,telefonoDomicilio,correoElectronico,idGenero,idUbicacionDomicilioPais,idUbicacionDomicilioProvincia,idUbicacionDomicilioCanton,idUbicacionDomicilioParroquia,direccionDomicilio,idEstadoCivil,idUbicacionNacimientoPais,idUbicacionNacimientoProvincia,idUbicacionNacimientoCanton,idUbicacionNacimientoParroquia,idIngresos,idEtnia,idTipoSangre,numeroHijos,idOcupacion,carnetConadis,idTipoDiscapacidad,porcentajeDiscapacidad,nombrePadre,paisOrigenPadre,idNivelEstudioPadre,nombreMadre,paisOrigenMadre,idNivelEstudioMadre,foto) VALUES ('$persona->identificacion','$persona->nombre1','$persona->nombre2','$persona->apellido1','$persona->apellido2','$persona->fechaNacimiento','$persona->telefonoCelular','$persona->telefonoDomicilio','$persona->correoElectronico','$persona->idGenero','$persona->idUbicacionDomicilioPais','$persona->idUbicacionDomicilioProvincia','$persona->idUbicacionDomicilioCanton','$persona->idUbicacionDomicilioParroquia','$persona->direccionDomicilio','$persona->idEstadoCivil','$persona->idUbicacionNacimientoPais','$persona->idUbicacionNacimientoProvincia','$persona->idUbicacionNacimientoCanton','$persona->idUbicacionNacimientoParroquia','$persona->idIngresos','$persona->idEtnia','$persona->idTipoSangre','$persona->numeroHijos','$persona->idOcupacion','$persona->carnetConadis','$persona->idTipoDiscapacidad','$persona->porcentajeDiscapacidad','$persona->nombrePadre','$persona->paisOrigenPadre','$persona->idNivelEstudioPadre','$persona->nombreMadre','$persona->paisOrigenMadre','$persona->idNivelEstudioMadre','$persona->foto');";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(Persona $persona)
   {
      $sql = "UPDATE Persona SET identificacion = '$persona->identificacion',nombre1 = '$persona->nombre1',nombre2 = '$persona->nombre2',apellido1 = '$persona->apellido1',apellido2 = '$persona->apellido2',fechaNacimiento = '$persona->fechaNacimiento',telefonoCelular = '$persona->telefonoCelular',telefonoDomicilio = '$persona->telefonoDomicilio',correoElectronico = '$persona->correoElectronico',idGenero = '$persona->idGenero',idUbicacionDomicilioPais = '$persona->idUbicacionDomicilioPais',idUbicacionDomicilioProvincia = '$persona->idUbicacionDomicilioProvincia',idUbicacionDomicilioCanton = '$persona->idUbicacionDomicilioCanton',idUbicacionDomicilioParroquia = '$persona->idUbicacionDomicilioParroquia',direccionDomicilio = '$persona->direccionDomicilio',idEstadoCivil = '$persona->idEstadoCivil',idUbicacionNacimientoPais = '$persona->idUbicacionNacimientoPais',idUbicacionNacimientoProvincia = '$persona->idUbicacionNacimientoProvincia',idUbicacionNacimientoCanton = '$persona->idUbicacionNacimientoCanton',idUbicacionNacimientoParroquia = '$persona->idUbicacionNacimientoParroquia',idIngresos = '$persona->idIngresos',idEtnia = '$persona->idEtnia',idTipoSangre = '$persona->idTipoSangre',numeroHijos = '$persona->numeroHijos',idOcupacion = '$persona->idOcupacion',carnetConadis = '$persona->carnetConadis',idTipoDiscapacidad = '$persona->idTipoDiscapacidad',porcentajeDiscapacidad = '$persona->porcentajeDiscapacidad',nombrePadre = '$persona->nombrePadre',paisOrigenPadre = '$persona->paisOrigenPadre',idNivelEstudioPadre = '$persona->idNivelEstudioPadre',nombreMadre = '$persona->nombreMadre',paisOrigenMadre = '$persona->paisOrigenMadre',idNivelEstudioMadre = '$persona->idNivelEstudioMadre',foto = '$persona->foto' WHERE id = $persona->id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $sql = "DELETE FROM Persona WHERE id = $id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Persona;";
      }else{
         $sql = "SELECT * FROM Persona WHERE id = $id;";
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
      $sql ="SELECT * FROM Persona LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM Persona;";
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
            $sql = "SELECT * FROM Persona WHERE $nombreColumna = '$filtro';";
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
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}