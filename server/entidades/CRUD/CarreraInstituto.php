<?php
class CarreraInstituto
{
   public $id;
   public $idInstituto;
   public $idCarrera;

   function __construct($id,$idInstituto,$idCarrera){
      $this->id = $id;
      $this->idInstituto = $idInstituto;
      $this->idCarrera = $idCarrera;
   }
}
?>