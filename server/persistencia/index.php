<?php
include_once("./AdministradorBaseDatos.php");

$conexion = new AdministradorBaseDatos("local");
$respuesta = $conexion->ejecutarConsulta("SELECT * from Genero;");
echo json_encode($respuesta);