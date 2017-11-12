<?php
namespace CRUD\ENTIDADES;
class PeriodoLectivo
{
   public $id;
   public $descripcion;
   public $fechaInicio;
   public $fechaFin;
   public $matriculable;
   public $codigo;

   function __construct(int $id,string $descripcion,DateTime $fechaInicio,DateTime $fechaFin,tinyint $matriculable,string $codigo){
      $this->id = $id;
      $this->descripcion = $descripcion;
      $this->fechaInicio = $fechaInicio;
      $this->fechaFin = $fechaFin;
      $this->matriculable = $matriculable;
      $this->codigo = $codigo;
   }
}
?>