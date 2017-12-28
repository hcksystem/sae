<?php
class Cupo
{
   public $id;
   public $idJornadaCarrera;
   public $idPersona;
   public $idEstadoCupo;
   public $fecha;

   function __construct($id,$idJornadaCarrera,$idPersona,$idEstadoCupo,$fecha){
      $this->id = $id;
      $this->idJornadaCarrera = $idJornadaCarrera;
      $this->idPersona = $idPersona;
      $this->idEstadoCupo = $idEstadoCupo;
      $this->fecha = $fecha;
   }
}
?>