<?php
namespace CRUD\ENTIDADES;
class Malla
{
   public $id;
   public $fechaMallaInicio;
   public $fechaMallaFin;
   public $idCarrera;
   public $idDocResolucion;

   function __construct(int $id,DateTime $fechaMallaInicio,DateTime $fechaMallaFin,int $idCarrera,int $idDocResolucion){
      $this->id = $id;
      $this->fechaMallaInicio = $fechaMallaInicio;
      $this->fechaMallaFin = $fechaMallaFin;
      $this->idCarrera = $idCarrera;
      $this->idDocResolucion = $idDocResolucion;
   }
}
?>