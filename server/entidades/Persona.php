<?php
class Persona
{
   public $id;
   public $identificacion;
   public $nombre1;
   public $nombre2;
   public $apellido1;
   public $apellido2;
   public $fechaNacimiento;
   public $telefonoCelular;
   public $telefonoDomicilio;
   public $correoElectronico;
   public $idGenero;
   public $idUbicacionDomicilioPais;
   public $idUbicacionDomicilioProvincia;
   public $idUbicacionDomicilioCanton;
   public $idUbicacionDomicilioParroquia;
   public $direccionDomicilio;
   public $idEstadoCivil;
   public $idUbicacionNacimientoPais;
   public $idUbicacionNacimientoProvincia;
   public $idUbicacionNacimientoCanton;
   public $idUbicacionNacimientoParroquia;
   public $idIngresos;
   public $idEtnia;
   public $idTipoSangre;
   public $numeroHijos;
   public $idOcupacion;
   public $carnetConadis;
   public $idTipoDiscapacidad;
   public $porcentajeDiscapacidad;
   public $nombrePadre;
   public $paisOrigenPadre;
   public $idNivelEstudioPadre;
   public $nombreMadre;
   public $paisOrigenMadre;
   public $idNivelEstudioMadre;
   public $foto;

   function __construct($id,$identificacion,$nombre1,$nombre2,$apellido1,$apellido2,$fechaNacimiento,$telefonoCelular,$telefonoDomicilio,$correoElectronico,$idGenero,$idUbicacionDomicilioPais,$idUbicacionDomicilioProvincia,$idUbicacionDomicilioCanton,$idUbicacionDomicilioParroquia,$direccionDomicilio,$idEstadoCivil,$idUbicacionNacimientoPais,$idUbicacionNacimientoProvincia,$idUbicacionNacimientoCanton,$idUbicacionNacimientoParroquia,$idIngresos,$idEtnia,$idTipoSangre,$numeroHijos,$idOcupacion,$carnetConadis,$idTipoDiscapacidad,$porcentajeDiscapacidad,$nombrePadre,$paisOrigenPadre,$idNivelEstudioPadre,$nombreMadre,$paisOrigenMadre,$idNivelEstudioMadre,$foto){
      $this->id = $id;
      $this->identificacion = $identificacion;
      $this->nombre1 = $nombre1;
      $this->nombre2 = $nombre2;
      $this->apellido1 = $apellido1;
      $this->apellido2 = $apellido2;
      $this->fechaNacimiento = $fechaNacimiento;
      $this->telefonoCelular = $telefonoCelular;
      $this->telefonoDomicilio = $telefonoDomicilio;
      $this->correoElectronico = $correoElectronico;
      $this->idGenero = $idGenero;
      $this->idUbicacionDomicilioPais = $idUbicacionDomicilioPais;
      $this->idUbicacionDomicilioProvincia = $idUbicacionDomicilioProvincia;
      $this->idUbicacionDomicilioCanton = $idUbicacionDomicilioCanton;
      $this->idUbicacionDomicilioParroquia = $idUbicacionDomicilioParroquia;
      $this->direccionDomicilio = $direccionDomicilio;
      $this->idEstadoCivil = $idEstadoCivil;
      $this->idUbicacionNacimientoPais = $idUbicacionNacimientoPais;
      $this->idUbicacionNacimientoProvincia = $idUbicacionNacimientoProvincia;
      $this->idUbicacionNacimientoCanton = $idUbicacionNacimientoCanton;
      $this->idUbicacionNacimientoParroquia = $idUbicacionNacimientoParroquia;
      $this->idIngresos = $idIngresos;
      $this->idEtnia = $idEtnia;
      $this->idTipoSangre = $idTipoSangre;
      $this->numeroHijos = $numeroHijos;
      $this->idOcupacion = $idOcupacion;
      $this->carnetConadis = $carnetConadis;
      $this->idTipoDiscapacidad = $idTipoDiscapacidad;
      $this->porcentajeDiscapacidad = $porcentajeDiscapacidad;
      $this->nombrePadre = $nombrePadre;
      $this->paisOrigenPadre = $paisOrigenPadre;
      $this->idNivelEstudioPadre = $idNivelEstudioPadre;
      $this->nombreMadre = $nombreMadre;
      $this->paisOrigenMadre = $paisOrigenMadre;
      $this->idNivelEstudioMadre = $idNivelEstudioMadre;
      $this->foto = $foto;
   }
}
?>