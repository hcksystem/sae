<?php
class Roles
{
   public $id;
   public $descripcion;
   public $acceso;

   function __construct(int $id,string $descripcion,int $acceso){
      $this->id = $id;
      $this->descripcion = $descripcion;
      $this->acceso = $acceso;
   }
}
?>