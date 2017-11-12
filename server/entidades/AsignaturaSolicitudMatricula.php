<?php
class AsignaturaSolicitudMatricula
{
   public $id;
   public $idSolicitudMatricula;
   public $idAsignatura;

   function __construct(int $id,int $idSolicitudMatricula,int $idAsignatura){
      $this->id = $id;
      $this->idSolicitudMatricula = $idSolicitudMatricula;
      $this->idAsignatura = $idAsignatura;
   }
}
?>