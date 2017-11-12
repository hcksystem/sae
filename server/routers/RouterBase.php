<?php
include_once("../modelos/DatosURI.php");
class RouterBase {

    public $datosURI;
  
    function __construct(){
        $this->datosURI = new DatosURI($_SERVER['REQUEST_URI']);
    }
}