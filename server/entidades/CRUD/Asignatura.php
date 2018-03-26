<?php
class Asignatura
{
   public $id;
   public $idMalla;
   public $codigo;
   public $nombre;
   public $idPeriodoAcademico;
   public $horasPractica;
   public $horasDocente;
   public $horasAutonomas;
   public $idUnidadOrganizacion;
   public $idCampoFormacion;

   function __construct($id,$idMalla,$codigo,$nombre,$nivel,$idDocumentoPea,$horasSemana,$horasPractica,$horasDocente,$horasAutonomas){
      $this->id = $id;
      $this->idMalla = $idMalla;
      $this->codigo = $codigo;
      $this->nombre = $nombre;
      $this->idPeriodoAcademico = $idPeriodoAcademico;
      $this->horasPractica = $horasPractica;
      $this->horasDocente = $horasDocente;
      $this->horasAutonomas = $horasAutonomas;
      $this->idUnidadOrganizacion = $idUnidadOrganizacion;
      $this->idCampoFormacion = $idCampoFormacion;
   }
}
?>