<?php
class Ponderacion
{
   public $id;
   public $idCategoria;
   public $idParcial;
   public $porcentaje;

   function __construct(int $id,int $idCategoria,int $idParcial,double $porcentaje){
      $this->id = $id;
      $this->idCategoria = $idCategoria;
      $this->idParcial = $idParcial;
      $this->porcentaje = $porcentaje;
   }
}
?>