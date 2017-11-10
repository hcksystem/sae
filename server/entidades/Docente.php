<?php
class Docente
{
   public $id;
   public $idPersona;
   public $fechaInicio;
   public $idEstado;

   function __construct(int $id,int $idPersona,DateTime $fechaInicio,int $idEstado){
      $this->id = $id;
      $this->idPersona = $idPersona;
      $this->fechaInicio = $fechaInicio;
      $this->idEstado = $idEstado;
   }
}
?>