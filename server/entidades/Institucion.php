<?php
namespace CRUD\ENTIDADES;
class Institucion
{
   public $id;
   public $nombre;
   public $idUbicacion;
   public $tipo;

   function __construct(int $id,int $nombre,int $idUbicacion,string $tipo){
      $this->id = $id;
      $this->nombre = $nombre;
      $this->idUbicacion = $idUbicacion;
      $this->tipo = $tipo;
   }
}
?>