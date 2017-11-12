<?php

include_once("../controladores/ControladorGenero.php");

$p1 = new ControladorGenero();

echo json_encode($p1->borrar(5));