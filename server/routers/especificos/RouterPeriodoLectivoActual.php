<?php
include_once('../routers/RouterBase.php');
include_once('../controladores/especificos/ControladorPeriodoLectivoActual.php');
class RouterPeriodoLectivoActual extends RouterBase
{
   public $controlador;

   function __construct(){
      parent::__construct();
      $this->controlador = new ControladorPeriodoLectivoActual();
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