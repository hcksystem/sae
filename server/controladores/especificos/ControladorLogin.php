<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/especificos/LoginResult.php');
class ControladorLogin extends ControladorBase
{
   function login(String $email, String $clave)
   {
      if($email == "prueba" && $clave == "123"){
          // AUTENTICAR CON GOOGLE SI EL EMAIL CON ESA CLAVE ES UN USUARIO
          // OBTENER LA ID DE LA PERSONA DUEÑA DE ESE EMAIL
          // OBTENER EL IDROL DE ESA PERSONA
         $toReturn = new LoginResult(1,1);
         return $toReturn;
      }else{
         return false;
      }
   }
}