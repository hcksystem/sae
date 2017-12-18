<?php
include_once('../routers/RouterBase.php');
include_once('../controladores/especificos/ControladorEstudiantesSolicitudMatricula.php');
class RouterEstudiantesSolicitudMatricula extends RouterBase
{
   public $controlador;

   function __construct(){
      parent::__construct();
      $this->controlador = new ControladorEstudiantesSolicitudMatricula();
   }
   function route()
   {
      switch (strtolower($this->datosURI->accion)){
         case "consultar":
            return $this->controlador->consultar();
            break;
      }
   }
}