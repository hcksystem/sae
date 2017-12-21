<?php
include_once('../routers/RouterBase.php');
include_once('../routers/RouterFuncionalidadesEspecificas.php');
function cargarRouters() {
   define("routersPath", "../routers/");
   $files = glob(routersPath."CRUD/*.php");
   foreach ($files as $filename) {
      include_once($filename);
   }
}
cargarRouters();

class RouterPrincipal extends RouterBase
{
   public $controlador;

   function route(){
      $NombreControlador = "Controlador".$this->datosURI->controlador;
      $this->controlador = new $NombreControlador();
      $NombreAccion = $this->datosURI->accion;
      return json_encode($this->controlador->$NombreAccion($args));
   }
}
