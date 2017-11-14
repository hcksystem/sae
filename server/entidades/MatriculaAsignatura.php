<?php
class MatriculaAsignatura
{
   public $id;
   public $idMatricula;
   public $idAsignatura;

   function __construct(int $id,int $idMatricula,int $idAsignatura){
      $this->id = $id;
      $this->idMatricula = $idMatricula;
      $this->idAsignatura = $idAsignatura;
   }
}
?>