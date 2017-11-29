<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/especificos/LoginResult.php');
class ControladorLogin extends ControladorBase
{
   function login(String $email, String $clave)
   { 
        // CIFRAR LA CLAVE
        $sql = "SELECT Persona.id as 'idPersona', Cuenta.idRol as 'idRol' FROM Persona INNER JOIN Cuenta ON Cuenta.idPersona = Persona.id WHERE Persona.correoElectronico = ?;";
        $parametros = array($email);
        $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
        if(is_null($respuesta[0])||$respuesta[0]==0){
           return false;
        }else{
            $in=imap_open("{pop.gmail.com:995/pop3/ssl}",$email, $clave);
            if($in==false){
               return false;
            }
            imap_close($in);
            return $respuesta[0];
        }   
   }
}