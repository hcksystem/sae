<?php

function cargarControladores() {
    define("controladoresDir", "../controladores/");
    $files = glob(controladoresPath."*.php");
    foreach ($files as $filename) {
        if($filename!=controladoresPath."ControladorBase.php"){
            include_once($filename);
        }        
    }
}

cargarControladores();

$a1 = new ControladorGenero();
echo json_encode($a1->leer());
