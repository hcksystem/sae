<?php
class DatosEstudiante
{
   public $id;
   public $idEstudiante;
   public $descripcion;
   public $dato;

   function __construct(int $id,int $idEstudiante,string $descripcion,string $dato){
      $this->id = $id;
      $this->idEstudiante = $idEstudiante;
      $this->descripcion = $descripcion;
      $this->dato = $dato;
   }
}
?>