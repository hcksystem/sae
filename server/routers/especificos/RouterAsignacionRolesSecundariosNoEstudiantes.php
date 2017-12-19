<?php
include_once('../routers/RouterBase.php');
include_once('../controladores/especificos/ControladorAsignacionRolesSecundariosNoEstudiantes.php');
class RouterAsignacionRolesSecundariosNoEstudiantes extends RouterBase
{
   public $controlador;

   function __construct(){
      parent::__construct();
      $this->controlador = new ControladorAsignacionRolesSecundariosNoEstudiantes();
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