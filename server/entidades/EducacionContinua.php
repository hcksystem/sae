<?php
class EducacionContinua
{
   public $id;
   public $descripcion;
   public $horas;
   public $fechaInicio;
   public $fechaFin;
   public $idTipoEducacionContinua;
   public $lugar;

   function __construct(int $id,string $descripcion,int $horas,DateTime $fechaInicio,DateTime $fechaFin,string $idTipoEducacionContinua,string $lugar){
      $this->id = $id;
      $this->descripcion = $descripcion;
      $this->horas = $horas;
      $this->fechaInicio = $fechaInicio;
      $this->fechaFin = $fechaFin;
      $this->idTipoEducacionContinua = $idTipoEducacionContinua;
      $this->lugar = $lugar;
   }
}
?>