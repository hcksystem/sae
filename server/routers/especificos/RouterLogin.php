<?php
include_once('../routers/RouterBase.php');
include_once('../controladores/especificos/ControladorLogin.php');
class RouterLogin extends RouterBase
{
   public $controlador;

   function __construct(){
      parent::__construct();
      $this->controlador = new ControladorLogin();
   }
   function route()
   {
      switch (strtolower($this->datosURI->accion)){
         case "cuenta":
            return $this->controlador->login($this->datosURI->argumentos["email"],$this->datosURI->argumentos["clave"]);
            break;
      }
   }
}