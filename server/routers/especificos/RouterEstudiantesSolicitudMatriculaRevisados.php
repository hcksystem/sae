<?php
include_once('../routers/RouterBase.php');
include_once('../controladores/especificos/ControladorEstudiantesSolicitudMatriculaRevisados.php');
class RouterEstudiantesSolicitudMatriculaRevisados extends RouterBase
{
   public $controlador;

   function __construct(){
      parent::__construct();
      $this->controlador = new ControladorEstudiantesSolicitudMatriculaRevisados();
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