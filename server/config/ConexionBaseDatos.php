<?php
include_once("../persistencia/DatosConexion.php");
class ConexionBaseDatos {
    private static $array = array();
    public static function DatosConexiones(){
        $array = array();
        $array[] = new DatosConexion("pruebasITSY","sdsd","","","");
        $array[] = new DatosConexion("local","localhost","ignug","prueba","12345678");
        return $array;
    }
}