<?php
class DatosCupo
{
   public $nombreCompleto;
   public $identificacion;
   public $carrera;
   public $idCarrera;
   public $siglasCarrera;
   public $jornada;
   
   function __construct($nombreCompleto, $identificacion, $carrera, $idCarrera, $siglasCarrera, $jornada){
      $this->nombreCompleto = $nombreCompleto;
      $this->identificacion = $identificacion;
      $this->carrera = $carrera;
      $this->idCarrera = $idCarrera;
      $this->siglasCarrera = $siglasCarrera;
      $this->jornada = $jornada;
   }
}
?>