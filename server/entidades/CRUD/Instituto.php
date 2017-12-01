<?php
class Instituto
{
   public $id;
   public $descripcion;
   public $rector;
   public $vicerector;
   public $color;

   function __construct($id,$descripcion,$rector,$vicerector,$color){
      $this->id = $id;
      $this->descripcion = $descripcion;
      $this->rector = $rector;
      $this->vicerector = $vicerector;
      $this->color = $color;
   }
}
?>