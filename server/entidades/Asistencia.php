<?php
namespace CRUD\ENTIDADES;
class Asistencia
{
   public $id;
   public $idMatriculaAsignatura;
   public $fecha;
   public $horas;

   function __construct(int $id,int $idMatriculaAsignatura,DateTime $fecha,int $horas){
      $this->id = $id;
      $this->idMatriculaAsignatura = $idMatriculaAsignatura;
      $this->fecha = $fecha;
      $this->horas = $horas;
   }
}
?>