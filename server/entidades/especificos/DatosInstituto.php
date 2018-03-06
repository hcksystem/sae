<?php
class DatosInstituto
{
   public $nombre;
   public $rector;
   public $viserector;
   public $colorCarpeta;
   
   function __construct($nombre, $rector, $viserector, $colorCarpeta){
      $this->nombre = $nombre;
      $this->rector = $rector;
      $this->viserector = $viserector;
      $this->colorCarpeta = $colorCarpeta;
   }
}
?>