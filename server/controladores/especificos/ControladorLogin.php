<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/especificos/LoginResult.php');
class ControladorLogin extends ControladorBase
{
   function login(String $email, String $clave)
   { 
       $in=imap_open("{pop.gmail.com:995/pop3/ssl}",$email, $clave);
       if($in==false){
          return false;
       }
       imap_close($in);
       $sql = "SELECT Persona.id, Cuenta.idRol FROM Persona INNER JOIN Cuenta ON Cuenta.idPersona = Persona.id WHERE Persona.correoElectronico = ?;";
       $parametros = array($email);
       $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
       if(is_null($respuesta[0])||$respuesta[0]==0){
          return false;
       }else{
          return $respuesta[0];
       }
   }
}