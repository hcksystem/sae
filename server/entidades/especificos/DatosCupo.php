<?php
class DatosCupo
{
   public $nombreCompleto;
   public $identificacion;
   public $carrera;
   public $idCarrera;
   public $jornada;
   
   function __construct($nombreCompleto, $identificacion, $carrera, $idCarrera, $jornada){
      $this->nombreCompleto = $nombreCompleto;
      $this->identificacion = $identificacion;
      $this->carrera = $carrera;
      $this->idCarrera = $idCarrera;
      $this->jornada = $jornada;
   }
}
?>