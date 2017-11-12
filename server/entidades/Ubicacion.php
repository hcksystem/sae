<?php
namespace CRUD\ENTIDADES;
class Ubicacion
{
   public $id;
   public $codigo;
   public $descripcion;
   public $codigoPadre;

   function __construct(int $id,string $codigo,string $descripcion,string $codigoPadre){
      $this->id = $id;
      $this->codigo = $codigo;
      $this->descripcion = $descripcion;
      $this->codigoPadre = $codigoPadre;
   }
}
?>