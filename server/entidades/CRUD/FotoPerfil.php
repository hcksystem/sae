<?php
class FotoPerfil
{
   public $id;
   public $idPersona;
   public $foto;

   function __construct($id,$idPersona,$foto){
      $this->id = $id;
      $this->idPersona = $idPersona;
      $this->foto = $foto;
   }
}
?>