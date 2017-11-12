<?php
namespace CRUD\ENTIDADES;
class EstadoPersona
{
   public $id;
   public $idPersona;
   public $datosCompletos;
   public $edicionDeDatos;
   public $encuestaFactoresAsociados;

   function __construct(int $id,int $idPersona,tinyint $datosCompletos,string $edicionDeDatos,tinyint $encuestaFactoresAsociados){
      $this->id = $id;
      $this->idPersona = $idPersona;
      $this->datosCompletos = $datosCompletos;
      $this->edicionDeDatos = $edicionDeDatos;
      $this->encuestaFactoresAsociados = $encuestaFactoresAsociados;
   }
}
?>