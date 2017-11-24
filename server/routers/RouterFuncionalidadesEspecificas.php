<?php

function cargarRoutersEspecificos() {
    define("routersPath", "../routers/especificos/");
    $files = glob(routersPath."*.php");
    foreach ($files as $filename) {
       include_once($filename);
    }
 }
 cargarRoutersEspecificos();
 
 class RouterFuncionalidadesEspecificas extends RouterBase
 {
    function route(){
       switch(strtolower($this->datosURI->controlador)){
          case "login":
            $routerLogin = new RouterLogin();
            return json_encode($routerLogin->route());
            break;
       }
    }
 }
 