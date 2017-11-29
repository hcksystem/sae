<?php
class Notas
{
   public $id;
   public $idParcial;
   public $idMatriculaAsignatura;

   function __construct(int $id,int $idParcial,int $idMatriculaAsignatura){
      $this->id = $id;
      $this->idParcial = $idParcial;
      $this->idMatriculaAsignatura = $idMatriculaAsignatura;
   }
}
?>