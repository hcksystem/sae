<?php
class LoginResult
{
   public $idPersona;
   public $idRol;

   function __construct(int $idPersona,int $idRol){
      $this->idPersona = $idPersona;
      $this->idRol = $idRol;
   }
}
?>