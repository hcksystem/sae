<?php
namespace CRUD\ENTIDADES;
class ExperienciaLaboral
{
   public $id;
   public $idPersona;
   public $fechaInicio;
   public $fechaFin;
   public $descripcionCargo;
   public $descripcionFunciones;
   public $nombreEmpresa;
   public $idMotivoSalida;

   function __construct(int $id,int $idPersona,DateTime $fechaInicio,DateTime $fechaFin,string $descripcionCargo,string $descripcionFunciones,string $nombreEmpresa,int $idMotivoSalida){
      $this->id = $id;
      $this->idPersona = $idPersona;
      $this->fechaInicio = $fechaInicio;
      $this->fechaFin = $fechaFin;
      $this->descripcionCargo = $descripcionCargo;
      $this->descripcionFunciones = $descripcionFunciones;
      $this->nombreEmpresa = $nombreEmpresa;
      $this->idMotivoSalida = $idMotivoSalida;
   }
}
?>