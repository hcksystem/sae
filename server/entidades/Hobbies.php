<?php
namespace CRUD\ENTIDADES;
class Hobbies
{
   public $id;
   public $idPersona;
   public $descripcion;

   function __construct(int $id,int $idPersona,string $descripcion){
      $this->id = $id;
      $this->idPersona = $idPersona;
      $this->descripcion = $descripcion;
   }
}
?>