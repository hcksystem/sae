<?php
namespace CRUD\ENTIDADES;
class Enfermedad
{
   public $id;
   public $descripcion;
   public $observaciones;
   public $tratamiento;

   function __construct(int $id,string $descripcion,string $observaciones,string $tratamiento){
      $this->id = $id;
      $this->descripcion = $descripcion;
      $this->observaciones = $observaciones;
      $this->tratamiento = $tratamiento;
   }
}
?>