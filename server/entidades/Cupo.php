<?php
class Cupo
{
   public $id;
   public $idJornadaCarrera;
   public $idPersona;

   function __construct($id,$idJornadaCarrera,$idPersona){
      $this->id = $id;
      $this->idJornadaCarrera = $idJornadaCarrera;
      $this->idPersona = $idPersona;
   }
}
?>