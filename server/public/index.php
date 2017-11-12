<?php

function cargarControladores() {
    $files = glob("../controladores/*.php");
    foreach ($files as $filename) {
        include_once($filename);
    }
}

cargarControladores();

use CRUD\CONTROLADORES\ControladorGenero;
$a1 = new ControladorGenero();
echo $a1->leer();
