<?php
class AulasAsignaturas
{
   public $id;
   public $idAula;
   public $idDocenteAsignatura;

   function __construct(int $id,int $idAula,int $idDocenteAsignatura){
      $this->id = $id;
      $this->idAula = $idAula;
      $this->idDocenteAsignatura = $idDocenteAsignatura;
   }
}
?>