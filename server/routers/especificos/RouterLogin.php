<?php
include_once('../routers/RouterBase.php');
//include_once('../controladores/CRUD/ControladorUbicacion.php');
class RouterLogin extends RouterBase
{
   public $controlador;

   function __construct(){
      parent::__construct();
  //    $this->controlador = new ControladorUbicacion();
   }
   function route()
   {
      switch (strtolower($this->datosURI->accion)){
         case "user":
            return "logeado";
            break;
      }
   }
}