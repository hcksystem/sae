<?php
class Contacto
{
   public $id;
   public $idPersona;
   public $descripcion;
   public $contacto;

   function __construct(int $id,int $idPersona,string $descripcion,string $contacto){
      $this->id = $id;
      $this->idPersona = $idPersona;
      $this->descripcion = $descripcion;
      $this->contacto = $contacto;
   }
}
?>