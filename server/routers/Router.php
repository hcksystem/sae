<?php
include_once('../modelos/DatosURI.php');

function cargarControladores() {
    define("controladoresPath", "../controladores/");
    $files = glob(controladoresPath."*.php");
    foreach ($files as $filename) {
        if($filename!=controladoresPath."ControladorBase.php"){
            include_once($filename);
        }        
    }
}

cargarControladores();
$datosURI = new DatosURI($_SERVER['REQUEST_URI']);
echo var_dump($datosURI->accion);
