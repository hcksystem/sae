<?php
namespace CRUD\ENTIDADES;
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

   function __construct(int $id,int $idMalla,string $codigo,string $nombre,int $nivel,int $idDocumentoPea,int $horasSemana,int $horasPractica,int $horasDocente,int $horasAutonomas){
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