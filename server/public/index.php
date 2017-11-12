<?php

include_once("../controladores/ControladorGenero.php");

$p1 = new ControladorGenero();

echo json_encode($p1->leerPaginado(3,2));