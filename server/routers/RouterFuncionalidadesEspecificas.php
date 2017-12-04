<?php
header('Content-Type: text/html; charset=UTF-8');
function cargarRoutersEspecificos() {
    define("routersEspecificosPath", "../routers/especificos/");
    $files = glob(routersEspecificosPath."*.php");
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
          case "asistencia_estudiante":
            $routerAsistenciaEstudiante = new RouterAsistenciaEstudiante();
            return json_encode($routerAsistenciaEstudiante->route());
            break; 
       }
    }
 }
 