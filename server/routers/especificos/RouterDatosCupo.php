<?php
include_once('../routers/RouterBase.php');
include_once('../controladores/especificos/ControladorDatosCupo.php');
class RouterDatosCupo extends RouterBase
{
   public $controlador;

   function __construct(){
      parent::__construct();
      $this->controlador = new ControladorDatosCupo();
   }
   function route()
   {
      switch (strtolower($this->datosURI->accion)){
         case "consultar":
            return $this->controlador->consultar($this->datosURI->argumentos["idPersona"]);
            break;
      }
   }
}