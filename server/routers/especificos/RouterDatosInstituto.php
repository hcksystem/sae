<?php
include_once('../routers/RouterBase.php');
include_once('../controladores/especificos/ControladorDatosInstituto.php');
class RouterDatosInstituto extends RouterBase
{
   public $controlador;

   function __construct(){
      parent::__construct();
      $this->controlador = new ControladorDatosInstituto();
   }
   function route()
   {
      switch (strtolower($this->datosURI->accion)){
         case "consultar":
            return $this->controlador->consultar($this->datosURI->argumentos["idCarrera"]);
            break;
      }
   }
}