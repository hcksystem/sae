<?php
namespace CRUD\ENTIDADES;
class Discapacidad
{
   public $id;
   public $idPersona;
   public $idTipoDiscapacidad;
   public $porcentaje;

   function __construct(int $id,int $idPersona,string $idTipoDiscapacidad,double $porcentaje){
      $this->id = $id;
      $this->idPersona = $idPersona;
      $this->idTipoDiscapacidad = $idTipoDiscapacidad;
      $this->porcentaje = $porcentaje;
   }
}
?>