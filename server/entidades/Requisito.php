<?php
namespace CRUD\ENTIDADES;
class Requisito
{
   public $id;
   public $idAsignaturaDependiente;
   public $idAsignaturaIndependiente;
   public $idTipoRequisito;

   function __construct(int $id,int $idAsignaturaDependiente,int $idAsignaturaIndependiente,string $idTipoRequisito){
      $this->id = $id;
      $this->idAsignaturaDependiente = $idAsignaturaDependiente;
      $this->idAsignaturaIndependiente = $idAsignaturaIndependiente;
      $this->idTipoRequisito = $idTipoRequisito;
   }
}
?>