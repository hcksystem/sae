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

switch (strtolower($datosURI->controlador)){
  case "genero":
    switch (strtolower($datosURI->accion)){
      case "crear":
        echo json_encode((new ControladorGenero())->crear(new Genero($datosURI->argumentos["id"],$datosURI->argumentos["descripcion"])));
        break;
      case "actualizar":
        echo json_encode((new ControladorGenero())->actualizar(new Genero($datosURI->argumentos["id"],$datosURI->argumentos["descripcion"])));
        break;
      case "borrar":
        echo json_encode((new ControladorGenero())->borrar($datosURI->argumentos["id"]));
        break;
      case "leer":
        echo json_encode((new ControladorGenero())->leer($datosURI->argumentos["id"]));
        break;
      case "leer_paginado":
        echo json_encode((new ControladorGenero())->leer_paginado($datosURI->argumentos["pagina"],$datosURI->argumentos["registros_por_pagina"]));
        break;
      case "leer_filtrado":
        echo json_encode((new ControladorGenero())->leer_filtrado($datosURI->argumentos["columna"],$datosURI->argumentos["tipo_filtro"],$datosURI->argumentos["filtro"]));
        break;
    }      
    break;
}