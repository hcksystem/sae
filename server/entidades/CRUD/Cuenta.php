<?php
class Cuenta
{
   public $id;
   public $idRol;
   public $idPersona;

   function __construct(int $id,int $idRol,int $idPersona){
      $this->id = $id;
      $this->idRol = $idRol;
      $this->idPersona = $idPersona;
   }
}
?>