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
            return $this->controlador->numero_paginas($this->datosURI->argumentos["registros_por_pagina"]);
            break;
         case "leer_filtrado":
            return $this->controlador->leer_filtrado($this->datosURI->argumentos["columna"],$this->datosURI->argumentos["tipo_filtro"],$this->datosURI->argumentos["filtro"]);
            break;
         case "crear":
            return $this->controlador->crear(new Persona($this->datosURI->mensaje_body["id"],$this->datosURI->mensaje_body["identificacion"],$this->datosURI->mensaje_body["nombre1"],$this->datosURI->mensaje_body["nombre2"],$this->datosURI->mensaje_body["apellido1"],$this->datosURI->mensaje_body["apellido2"],$this->datosURI->mensaje_body["fechaNacimiento"],$this->datosURI->mensaje_body["telefonoCelular"],$this->datosURI->mensaje_body["telefonoDomicilio"],$this->datosURI->mensaje_body["correoElectronico"],$this->datosURI->mensaje_body["idGenero"],$this->datosURI->mensaje_body["idUbicacionDomicilioPais"],$this->datosURI->mensaje_body["idUbicacionDomicilioProvincia"],$this->datosURI->mensaje_body["idUbicacionDomicilioCanton"],$this->datosURI->mensaje_body["idUbicacionDomicilioParroquia"],$this->datosURI->mensaje_body["direccionDomicilio"],$this->datosURI->mensaje_body["idEstadoCivil"],$this->datosURI->mensaje_body["idUbicacionNacimientoPais"],$this->datosURI->mensaje_body["idUbicacionNacimientoProvincia"],$this->datosURI->mensaje_body["idUbicacionNacimientoCanton"],$this->datosURI->mensaje_body["idUbicacionNacimientoParroquia"],$this->datosURI->mensaje_body["idIngresos"],$this->datosURI->mensaje_body["idEtnia"],$this->datosURI->mensaje_body["idTipoSangre"],$this->datosURI->mensaje_body["numeroHijos"],$this->datosURI->mensaje_body["idOcupacion"],$this->datosURI->mensaje_body["carnetConadis"],$this->datosURI->mensaje_body["idTipoDiscapacidad"],$this->datosURI->mensaje_body["porcentajeDiscapacidad"],$this->datosURI->mensaje_body["nombrePadre"],$this->datosURI->mensaje_body["paisOrigenPadre"],$this->datosURI->mensaje_body["idNivelEstudioPadre"],$this->datosURI->mensaje_body["nombreMadre"],$this->datosURI->mensaje_body["paisOrigenMadre"],$this->datosURI->mensaje_body["idNivelEstudioMadre"],$this->datosURI->mensaje_body["foto"]));
            break;
         case "actualizar":
            return $this->controlador->actualizar(new Persona($this->datosURI->mensaje_body["id"],$this->datosURI->mensaje_body["identificacion"],$this->datosURI->mensaje_body["nombre1"],$this->datosURI->mensaje_body["nombre2"],$this->datosURI->mensaje_body["apellido1"],$this->datosURI->mensaje_body["apellido2"],$this->datosURI->mensaje_body["fechaNacimiento"],$this->datosURI->mensaje_body["telefonoCelular"],$this->datosURI->mensaje_body["telefonoDomicilio"],$this->datosURI->mensaje_body["correoElectronico"],$this->datosURI->mensaje_body["idGenero"],$this->datosURI->mensaje_body["idUbicacionDomicilioPais"],$this->datosURI->mensaje_body["idUbicacionDomicilioProvincia"],$this->datosURI->mensaje_body["idUbicacionDomicilioCanton"],$this->datosURI->mensaje_body["idUbicacionDomicilioParroquia"],$this->datosURI->mensaje_body["direccionDomicilio"],$this->datosURI->mensaje_body["idEstadoCivil"],$this->datosURI->mensaje_body["idUbicacionNacimientoPais"],$this->datosURI->mensaje_body["idUbicacionNacimientoProvincia"],$this->datosURI->mensaje_body["idUbicacionNacimientoCanton"],$this->datosURI->mensaje_body["idUbicacionNacimientoParroquia"],$this->datosURI->mensaje_body["idIngresos"],$this->datosURI->mensaje_body["idEtnia"],$this->datosURI->mensaje_body["idTipoSangre"],$this->datosURI->mensaje_body["numeroHijos"],$this->datosURI->mensaje_body["idOcupacion"],$this->datosURI->mensaje_body["carnetConadis"],$this->datosURI->mensaje_body["idTipoDiscapacidad"],$this->datosURI->mensaje_body["porcentajeDiscapacidad"],$this->datosURI->mensaje_body["nombrePadre"],$this->datosURI->mensaje_body["paisOrigenPadre"],$this->datosURI->mensaje_body["idNivelEstudioPadre"],$this->datosURI->mensaje_body["nombreMadre"],$this->datosURI->mensaje_body["paisOrigenMadre"],$this->datosURI->mensaje_body["idNivelEstudioMadre"],$this->datosURI->mensaje_body["foto"]));
            break;
      }
   }
}