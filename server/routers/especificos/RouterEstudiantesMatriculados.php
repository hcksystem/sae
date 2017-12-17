<?php
include_once('../routers/RouterBase.php');
include_once('../controladores/especificos/ControladorEstudiantesMatriculados.php');
class RouterEstudiantesMatriculados extends RouterBase
{
   public $controlador;

   function __construct(){
      parent::__construct();
      $this->controlador = new ControladorEstudiantesMatriculados();
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