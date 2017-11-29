<?php
class FotoPerfil
{
   public $id;
   public $idPersona;
   public $foto;

   function __construct(int $id,int $idPersona,string $foto){
      $this->id = $id;
      $this->idPersona = $idPersona;
      $this->foto = $foto;
   }
}
?>