<?php
namespace CRUD\ENTIDADES;
class JornadaCarrera
{
   public $id;
   public $idJornada;
   public $idCarrera;

   function __construct(int $id,int $idJornada,int $idCarrera){
      $this->id = $id;
      $this->idJornada = $idJornada;
      $this->idCarrera = $idCarrera;
   }
}
?>