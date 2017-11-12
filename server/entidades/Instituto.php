<?php
namespace CRUD\ENTIDADES;
class Instituto
{
   public $id;
   public $descripcion;
   public $rector;
   public $vicerector;
   public $color;

   function __construct(int $id,string $descripcion,string $rector,string $vicerector,string $color){
      $this->id = $id;
      $this->descripcion = $descripcion;
      $this->rector = $rector;
      $this->vicerector = $vicerector;
      $this->color = $color;
   }
}
?>