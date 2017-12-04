<?php
class MatriculaAsignatura
{
   public $id;
   public $idMatricula;
   public $idAsignatura;

   function __construct($id,$idMatricula,$idAsignatura){
      $this->id = $id;
      $this->idMatricula = $idMatricula;
      $this->idAsignatura = $idAsignatura;
   }
}
?>