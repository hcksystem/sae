<?php
class Asignatura
{
   public $id;
   public $idMalla;
   public $codigo;
   public $nombre;
   public $nivel;
   public $idDocumentoPea;
   public $horasSemana;
   public $horasPractica;
   public $horasDocente;
   public $horasAutonomas;

   function __construct($id,$idMalla,$codigo,$nombre,$nivel,$idDocumentoPea,$horasSemana,$horasPractica,$horasDocente,$horasAutonomas){
      $this->id = $id;
      $this->idMalla = $idMalla;
      $this->codigo = $codigo;
      $this->nombre = $nombre;
      $this->nivel = $nivel;
      $this->idDocumentoPea = $idDocumentoPea;
      $this->horasSemana = $horasSemana;
      $this->horasPractica = $horasPractica;
      $this->horasDocente = $horasDocente;
      $this->horasAutonomas = $horasAutonomas;
   }
}
?>