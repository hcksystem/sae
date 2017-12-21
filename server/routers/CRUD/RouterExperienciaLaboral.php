<?php
include_once('../routers/RouterBase.php');
include_once('../controladores/CRUD/Controladorexperiencialaboral.php');
class RouterExperienciaLaboral extends RouterBase
{
   public $controlador;

   function __construct(){
      parent::__construct();
      $this->controlador = new Controladorexperiencialaboral();
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
            return $this->controlador->crear(new ExperienciaLaboral($this->datosURI->mensaje_body["id"],$this->datosURI->mensaje_body["idPersona"],$this->datosURI->mensaje_body["fechaInicio"],$this->datosURI->mensaje_body["fechaFin"],$this->datosURI->mensaje_body["descripcionCargo"],$this->datosURI->mensaje_body["descripcionFunciones"],$this->datosURI->mensaje_body["nombreEmpresa"],$this->datosURI->mensaje_body["idMotivoSalida"]));
            break;
         case "actualizar":
            return $this->controlador->actualizar(new ExperienciaLaboral($this->datosURI->mensaje_body["id"],$this->datosURI->mensaje_body["idPersona"],$this->datosURI->mensaje_body["fechaInicio"],$this->datosURI->mensaje_body["fechaFin"],$this->datosURI->mensaje_body["descripcionCargo"],$this->datosURI->mensaje_body["descripcionFunciones"],$this->datosURI->mensaje_body["nombreEmpresa"],$this->datosURI->mensaje_body["idMotivoSalida"]));
            break;
      }
   }
}