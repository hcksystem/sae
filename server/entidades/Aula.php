<?php
class Aula
{
   public $id;
   public $capacidad;
   public $descripcion;
   public $idTipoAula;

   function __construct(int $id,int $capacidad,string $descripcion,int $idTipoAula){
      $this->id = $id;
      $this->capacidad = $capacidad;
      $this->descripcion = $descripcion;
      $this->idTipoAula = $idTipoAula;
   }
}
?>