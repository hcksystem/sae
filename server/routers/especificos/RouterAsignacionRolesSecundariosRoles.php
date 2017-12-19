<?php
include_once('../routers/RouterBase.php');
include_once('../controladores/especificos/ControladorAsignacionRolesSecundariosRoles.php');
class RouterAsignacionRolesSecundariosRoles extends RouterBase
{
   public $controlador;

   function __construct(){
      parent::__construct();
      $this->controlador = new ControladorAsignacionRolesSecundariosRoles();
   }
   function route()
   {
      switch (strtolower($this->datosURI->accion)){
         case "consultar":
            return  $this->controlador->consultar($this->datosURI->argumentos["idCarrera"]);
            break;
      }
   }
}