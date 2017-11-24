<?php
class Cuenta
{
   public $id;
   public $nickname;
   public $idRol;
   public $idPersona;
   public $clave;

   function __construct(int $id,string $nickname,int $idRol,int $idPersona,string $clave){
      $this->id = $id;
      $this->nickname = $nickname;
      $this->idRol = $idRol;
      $this->idPersona = $idPersona;
      $this->clave = $clave;
   }
}
?>