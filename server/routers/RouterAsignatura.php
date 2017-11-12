<?php
include_once('../routers/RouterBase.php');
include_once('../controladores/ControladorAsignatura.php');
class RouterAsignatura extends RouterBase
{
   public $controlador;

   function __construct(){
      parent::__construct();
      $this->controlador = new ControladorAsignatura();
   }
   function route()
   {
      switch (strtolower($this->datosURI->accion)){
         case "borrar":
            return $this->controlador->borrar($this->datosURI->argumentos["id"]);
            break;
         case "leer":
            return $this->controlador->leer($this->datosURI->argumentos["id"]);
            break;
         case "leer_paginado":
            return $this->controlador->leer_paginado($this->datosURI->argumentos["pagina"],$this->datosURI->argumentos["registros_por_pagina"]);
            break;
         case "leer_filtrado":
            return $this->controlador->leer_filtrado($this->datosURI->argumentos["columna"],$this->datosURI->argumentos["tipo_filtro"],$this->datosURI->argumentos["filtro"]);
            break;
         case "crear":
            return $this->controlador->crear(new Asignatura($this->datosURI->argumentos["id"],$this->datosURI->argumentos["idMalla"],$this->datosURI->argumentos["codigo"],$this->datosURI->argumentos["nombre"],$this->datosURI->argumentos["nivel"],$this->datosURI->argumentos["idDocumentoPea"],$this->datosURI->argumentos["horasSemana"],$this->datosURI->argumentos["horasPractica"],$this->datosURI->argumentos["horasDocente"],$this->datosURI->argumentos["horasAutonomas"]));
            break;
         case "actualizar":
            return $this->controlador->actualizar(new Asignatura($this->datosURI->argumentos["id"],$this->datosURI->argumentos["idMalla"],$this->datosURI->argumentos["codigo"],$this->datosURI->argumentos["nombre"],$this->datosURI->argumentos["nivel"],$this->datosURI->argumentos["idDocumentoPea"],$this->datosURI->argumentos["horasSemana"],$this->datosURI->argumentos["horasPractica"],$this->datosURI->argumentos["horasDocente"],$this->datosURI->argumentos["horasAutonomas"]));
            break;
      }
   }
}