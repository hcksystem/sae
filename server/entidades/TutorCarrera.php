<?php
class TutorCarrera
{
   public $id;
   public $idPersona;
   public $idCarrera;

   function __construct(int $id,int $idPersona,int $idCarrera){
      $this->id = $id;
      $this->idPersona = $idPersona;
      $this->idCarrera = $idCarrera;
   }
}
?>