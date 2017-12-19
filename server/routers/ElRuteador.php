<?php
include_once('../routers/RouterBase.php');
include_once('../routers/RouterFuncionalidadesEspecificas.php');

class ElRuteador extends RouterBase {
    public function cargarRouters() {
        define("routersPath", "../routers/");
        $files = glob(routersPath."CRUD/*.php");
        foreach ($files as $filename) {
            include_once($filename);
        }
    }

    public function cargarRoutersEspecificos() {
        define("routersEspecificosPath", "../routers/especificos/");
        $files = glob(routersEspecificosPath."*.php");
        foreach ($files as $filename) {
            include_once($filename);
        }
    }

    public function ejecutar() {
        $className = "Router" + strtolower($this->datosURI->controlador);
        $instance = new $className();

        $action = strtolower($this->datosURI->accion);
        if(is_callable(array($instance, $action))) {
            return json_encode($instance->$action($this->datosURI->argumentos));
        }
        return json_encode("No existe la acción " + $action);
    }
}

$ElRuteador = new ElRuteador();
$ElRuteador.cargarRouters();
$ElRuteador.cargarRoutersEspecificos();
$ElRuteador.ejecutar();