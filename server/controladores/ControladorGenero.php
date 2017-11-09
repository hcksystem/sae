<?php

include_once("ControladorBase.php");

class ControladorGenero extends ControladorBase
{
    public $generoCRUD;   
    
    public function __construct()    
    {    
        $this->generoCRUD = new generoCRUD();  
    }   

    function crear($genero)
    {
        $generoCreado = $this->generoCRUD->crear($genero);
        return $generoCreado;
    }

    function actualizar($id, $genero)
    {

    }

    function borrar($id)
    {

    }

    function leer($id)
    {

    }

    function leerPaginado($pagina,$tamano)
    {

    }
}