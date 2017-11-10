<?php
class Cuenta
{
   public $id;
   public $nickname;
   public $idUsuario;
   public $idRol;
   public $idPersona;
   public $clave;

   function __construct($id,$nickname,$idUsuario,$idRol,$idPersona,$clave){
      $this->id = $id;
      $this->nickname = $nickname;
      $this->idUsuario = $idUsuario;
      $this->idRol = $idRol;
      $this->idPersona = $idPersona;
      $this->clave = $clave;
   }
}
?>