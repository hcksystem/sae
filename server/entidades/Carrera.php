<?php
namespace CRUD\ENTIDADES;
class Carrera
{
   public $id;
   public $resolucion;
   public $nombre;
   public $descripcion;
   public $idModalidad;
   public $idInstituto;
   public $coordinador;
   public $siglas;

   function __construct(int $id,string $resolucion,string $nombre,string $descripcion,int $idModalidad,int $idInstituto,string $coordinador,string $siglas){
      $this->id = $id;
      $this->resolucion = $resolucion;
      $this->nombre = $nombre;
      $this->descripcion = $descripcion;
      $this->idModalidad = $idModalidad;
      $this->idInstituto = $idInstituto;
      $this->coordinador = $coordinador;
      $this->siglas = $siglas;
   }
}
?>