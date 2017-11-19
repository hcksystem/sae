<?php
class DetalleNotas
{
   public $id;
   public $descripcion;
   public $nota;
   public $idCateogiraNota;
   public $idNota;

   function __construct(int $id,string $descripcion,float $nota,int $idCateogiraNota,int $idNota){
      $this->id = $id;
      $this->descripcion = $descripcion;
      $this->nota = $nota;
      $this->idCateogiraNota = $idCateogiraNota;
      $this->idNota = $idNota;
   }
}
?>