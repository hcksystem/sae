<?php
class Cupo
{
   public $id;
   public $idJornadaCarrera;
   public $idPersona;
   public $idEstadoCupo;
   public $idPeriodoLectivo;
   public $fecha;

   function __construct($id,$idJornadaCarrera,$idPersona,$idEstadoCupo,$idPeriodoLectivo,$fecha){
      $this->id = $id;
      $this->idJornadaCarrera = $idJornadaCarrera;
      $this->idPersona = $idPersona;
      $this->idEstadoCupo = $idEstadoCupo;
      $this->idPeriodoLectivo = $idPeriodoLectivo;
      $this->fecha = $fecha;
   }
}
?>