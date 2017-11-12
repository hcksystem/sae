<?php
class DatosURI{
    public $controlador;
    public $accion;
    public $argumentos = array();
    public $mensaje_header;
    public $mensaje_body;

    function __construct($uri){
        $ruta_path = explode('?',$uri)[0];
        $variables_path = explode('?',$uri)[1];
        foreach(explode('&',$variables_path) as $variable){
            $nombre = explode('=',$variable)[0];
            $valor = explode('=',$variable)[1];
            if($nombre!=""){
                $this->argumentos = array_merge($this->argumentos,array($nombre=>$valor));
            }
        }
        $this->mensaje_body = json_decode(file_get_contents('php://input'),true);
        $this->mensaje_header = getallheaders();
        $partes_ruta = explode('/',$ruta_path);
        $this->accion = $partes_ruta[count($partes_ruta)-1];
        $this->controlador = $partes_ruta[count($partes_ruta)-2];  
    }
}