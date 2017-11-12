<?php
namespace CRUD\ENTIDADES;
class Cupo
{
   public $id;
   public $idJornadaCarrera;
   public $idPersona;

   function __construct(int $id,int $idJornadaCarrera,int $idPersona){
      $this->id = $id;
      $this->idJornadaCarrera = $idJornadaCarrera;
      $this->idPersona = $idPersona;
   }
}
?>