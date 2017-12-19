<?php
include_once('../routers/RouterBase.php');
include_once('../controladores/especificos/ControladorAsignacionRolesSecundariosPersonas.php');
class RouterAsignacionRolesSecundariosPersonas extends RouterBase
{
   public $controlador;

   function __construct(){
      parent::__construct();
      $this->controlador = new ControladorAsignacionRolesSecundariosPersonas();
   }
   function route()
   {
      switch (strtolower($this->datosURI->accion)){
         case "consultar":
            return  $this->controlador->consultar();
            break;
      }
   }
}