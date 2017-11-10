<?php
class Estudiante
{
   public $id;
   public $idPersona;
   public $notaPostulacion;
   public $tituloBachiller;
   public $idTipoInstitucionProcedencia;

   function __construct($id,$idPersona,$notaPostulacion,$tituloBachiller,$idTipoInstitucionProcedencia){
      $this->id = $id;
      $this->idPersona = $idPersona;
      $this->notaPostulacion = $notaPostulacion;
      $this->tituloBachiller = $tituloBachiller;
      $this->idTipoInstitucionProcedencia = $idTipoInstitucionProcedencia;
   }
}
?>