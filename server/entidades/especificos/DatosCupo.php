<?php
class DatosCupo
{
   public $nombreCompleto;
   public $identificacion;
   public $carrera;
   public $jornada;
   
   function __construct($nombreCompleto, $identificacion, $carrera, $jornada){
      $this->nombreCompleto = $nombreCompleto;
      $this->identificacion = $identificacion;
      $this->carrera = $carrera;
      $this->jornada = $jornada;
   }
}
?>