<?php

function cargarRouters() {
  define("routersPath", "../routers/");
  $files = glob(routersPath."*.php");
  foreach ($files as $filename) {
      if($filename!=routersPath."Router.php"||$filename!=routersPath."RouterBase.php"){
          include_once($filename);
      }        
  }
}
cargarRouters();

class RouterPrincipal extends RouterBase{
    function startRoute(){
      switch(strtolower($this->datosURI->controlador)){
        case "genero":
          $routerGenero = new RouterGenero();
          echo json_encode($routerGenero->route());
          break;
      }
    }
}
