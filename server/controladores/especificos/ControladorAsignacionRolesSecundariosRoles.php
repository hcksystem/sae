<?php
include_once('../controladores/ControladorBase.php');
class ControladorAsignacionRolesSecundariosRoles extends ControladorBase
{
   function consultar()
   { 
        // CIFRAR LA CLAVE
        $sql = "SELECT Roles.* FROM Roles WHERE Roles.id IN (SELECT DISTINCT(idRol) FROM RolSecundario) ORDER BY Roles.descripcion ASC;";
        $parametros = array($idCarrera);
        $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
        if(is_null($respuesta[0])||$respuesta[0]==0){
           return false;
        }else{
            return $respuesta;
        }   
   }
}