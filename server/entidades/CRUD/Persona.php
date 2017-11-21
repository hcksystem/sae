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

   function __construct(int $id,string $identificacion,string $nombre1,string $nombre2,string $apellido1,string $apellido2,DateTime $fechaNacimiento,string $telefonoCelular,string $telefonoDomicilio,string $correoElectronico,int $idGenero,string $idUbicacionDomicilioPais,string $idUbicacionDomicilioProvincia,string $idUbicacionDomicilioCanton,string $idUbicacionDomicilioParroquia,string $direccionDomicilio,int $idEstadoCivil,string $idUbicacionNacimientoPais,string $idUbicacionNacimientoProvincia,string $idUbicacionNacimientoCanton,string $idUbicacionNacimientoParroquia,float $idIngresos,int $idEtnia,int $idTipoSangre,int $numeroHijos,int $idOcupacion,string $carnetConadis,int $idTipoDiscapacidad,float $porcentajeDiscapacidad,string $nombrePadre,int $paisOrigenPadre,int $idNivelEstudioPadre,string $nombreMadre,int $paisOrigenMadre,int $idNivelEstudioMadre,string $foto){
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