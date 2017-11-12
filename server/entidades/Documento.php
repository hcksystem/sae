<?php
namespace CRUD\ENTIDADES;
class Documento
{
   public $id;
   public $documento;
   public $descripcion;

   function __construct(int $id,string $documento,string $descripcion){
      $this->id = $id;
      $this->documento = $documento;
      $this->descripcion = $descripcion;
   }
}
?>