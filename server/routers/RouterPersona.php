<?php
include_once('../routers/RouterBase.php');
include_once('../controladores/ControladorPersona.php');
class RouterPersona extends RouterBase
{
   public $controlador;

   function __construct(){
      parent::__construct();
      $this->controlador = new ControladorPersona();
   }
   function route()
   {
      switch (strtolower($this->datosURI->accion)){
         case "borrar":
            return $this->controlador->borrar($this->datosURI->argumentos["id"]);
            break;
         case "leer":
            return $this->controlador->leer($this->datosURI->argumentos["id"]);
            break;
         case "leer_paginado":
            return $this->controlador->leer_paginado($this->datosURI->argumentos["pagina"],$this->datosURI->argumentos["registros_por_pagina"]);
            break;
         case "numero_paginas":
            return $this->controlador->numero_paginas();
            break;
         case "leer_filtrado":
            return $this->controlador->leer_filtrado($this->datosURI->argumentos["columna"],$this->datosURI->argumentos["tipo_filtro"],$this->datosURI->argumentos["filtro"]);
            break;
         case "crear":
            return $this->controlador->crear(new Persona($this->datosURI->argumentos["id"],$this->datosURI->argumentos["identificacion"],$this->datosURI->argumentos["nombre1"],$this->datosURI->argumentos["nombre2"],$this->datosURI->argumentos["apellido1"],$this->datosURI->argumentos["apellido2"],$this->datosURI->argumentos["fechaNacimiento"],$this->datosURI->argumentos["telefonoCelular"],$this->datosURI->argumentos["telefonoDomicilio"],$this->datosURI->argumentos["correoElectronico"],$this->datosURI->argumentos["idGenero"],$this->datosURI->argumentos["idUbicacionDomicilioPais"],$this->datosURI->argumentos["idUbicacionDomicilioProvincia"],$this->datosURI->argumentos["idUbicacionDomicilioCanton"],$this->datosURI->argumentos["idUbicacionDomicilioParroquia"],$this->datosURI->argumentos["direccionDomicilio"],$this->datosURI->argumentos["idEstadoCivil"],$this->datosURI->argumentos["idUbicacionNacimientoPais"],$this->datosURI->argumentos["idUbicacionNacimientoProvincia"],$this->datosURI->argumentos["idUbicacionNacimientoCanton"],$this->datosURI->argumentos["idUbicacionNacimientoParroquia"],$this->datosURI->argumentos["idIngresos"],$this->datosURI->argumentos["idEtnia"],$this->datosURI->argumentos["idTipoSangre"],$this->datosURI->argumentos["numeroHijos"],$this->datosURI->argumentos["idOcupacion"],$this->datosURI->argumentos["carnetConadis"],$this->datosURI->argumentos["idTipoDiscapacidad"],$this->datosURI->argumentos["porcentajeDiscapacidad"],$this->datosURI->argumentos["nombrePadre"],$this->datosURI->argumentos["paisOrigenPadre"],$this->datosURI->argumentos["idNivelEstudioPadre"],$this->datosURI->argumentos["nombreMadre"],$this->datosURI->argumentos["paisOrigenMadre"],$this->datosURI->argumentos["idNivelEstudioMadre"],$this->datosURI->argumentos["foto"]));
            break;
         case "actualizar":
            return $this->controlador->actualizar(new Persona($this->datosURI->argumentos["id"],$this->datosURI->argumentos["identificacion"],$this->datosURI->argumentos["nombre1"],$this->datosURI->argumentos["nombre2"],$this->datosURI->argumentos["apellido1"],$this->datosURI->argumentos["apellido2"],$this->datosURI->argumentos["fechaNacimiento"],$this->datosURI->argumentos["telefonoCelular"],$this->datosURI->argumentos["telefonoDomicilio"],$this->datosURI->argumentos["correoElectronico"],$this->datosURI->argumentos["idGenero"],$this->datosURI->argumentos["idUbicacionDomicilioPais"],$this->datosURI->argumentos["idUbicacionDomicilioProvincia"],$this->datosURI->argumentos["idUbicacionDomicilioCanton"],$this->datosURI->argumentos["idUbicacionDomicilioParroquia"],$this->datosURI->argumentos["direccionDomicilio"],$this->datosURI->argumentos["idEstadoCivil"],$this->datosURI->argumentos["idUbicacionNacimientoPais"],$this->datosURI->argumentos["idUbicacionNacimientoProvincia"],$this->datosURI->argumentos["idUbicacionNacimientoCanton"],$this->datosURI->argumentos["idUbicacionNacimientoParroquia"],$this->datosURI->argumentos["idIngresos"],$this->datosURI->argumentos["idEtnia"],$this->datosURI->argumentos["idTipoSangre"],$this->datosURI->argumentos["numeroHijos"],$this->datosURI->argumentos["idOcupacion"],$this->datosURI->argumentos["carnetConadis"],$this->datosURI->argumentos["idTipoDiscapacidad"],$this->datosURI->argumentos["porcentajeDiscapacidad"],$this->datosURI->argumentos["nombrePadre"],$this->datosURI->argumentos["paisOrigenPadre"],$this->datosURI->argumentos["idNivelEstudioPadre"],$this->datosURI->argumentos["nombreMadre"],$this->datosURI->argumentos["paisOrigenMadre"],$this->datosURI->argumentos["idNivelEstudioMadre"],$this->datosURI->argumentos["foto"]));
            break;
      }
   }
}