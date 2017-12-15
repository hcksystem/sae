<?php
include_once('../routers/RouterBase.php');
include_once('../controladores/especificos/ControladorAsignaturasMatriculablesPrimerNivel.php');
class RouterAsignaturasMatriculablesPrimerNivel extends RouterBase
{
   public $controlador;

   function __construct(){
      parent::__construct();
      $this->controlador = new ControladorAsignaturasMatriculablesPrimerNivel();
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