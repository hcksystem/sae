<?php
namespace CRUD\ENTIDADES;
class HorasClase
{
   public $id;
   public $idAsignatura;
   public $idParalelo;
   public $fecha;
   public $horas;

   function __construct(int $id,int $idAsignatura,int $idParalelo,DateTime $fecha,int $horas){
      $this->id = $id;
      $this->idAsignatura = $idAsignatura;
      $this->idParalelo = $idParalelo;
      $this->fecha = $fecha;
      $this->horas = $horas;
   }
}
?>