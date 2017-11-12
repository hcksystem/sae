<?php

include_once("../controladores/ControladorBase.php");
include_once("../entidades/Genero.php");

class ControladorGenero extends ControladorBase
{   
    function crear(Genero $genero)
    {
        $respuesta = $this->conexion->ejecutarConsulta("INSERT INTO Genero (descripcion) VALUES ('$genero->descripcion');");
        foreach($respuesta as $fila){
            $toReturn[] = $fila;
        }
        return $toReturn;
    }

    function actualizar(Genero $genero)
    {
        $respuesta = $this->conexion->ejecutarConsulta("UPDATE Genero SET descripcion = '$genero->descripcion' WHERE id = $genero->id;");
        foreach($respuesta as $fila){
            $toReturn[] = $fila;
        }
        return $toReturn;
    }

    function borrar(int $id)
    {
        $respuesta = $this->conexion->ejecutarConsulta("DELETE FROM Genero WHERE id = $id;");
        foreach($respuesta as $fila){
            $toReturn[] = $fila;
        }
        return $toReturn;
    }

    function leer($id)
    {
        if ($id==""){
            $sql = "SELECT * FROM Genero;";
        }else{
            $sql = "SELECT * FROM Genero WHERE id = $id;";
        }
        $respuesta = $this->conexion->ejecutarConsulta($sql);
        foreach($respuesta as $fila){
            $toReturn[] = $fila;
        }
        return $toReturn;
    }

    function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
    {
        switch ($tipoFiltro){
            case "coincide":
                $sql = "SELECT * FROM Genero WHERE $nombreColumna = '$filtro';";
                break;
            case "inicia":
                $sql = "SELECT * FROM Genero WHERE $nombreColumna like '$filtro%';";
                break;
            case "termina":
                $sql = "SELECT * FROM Genero WHERE $nombreColumna like '%$filtro';";
                break;
            default:
                $sql = "SELECT * FROM Genero WHERE $nombreColumna like '%$filtro%';";
                break;
        }
        $respuesta = $this->conexion->ejecutarConsulta($sql);
        foreach($respuesta as $fila){
            $toReturn[] = $fila;
        }
        return $toReturn;
    }

    function leerPaginado($pagina,$registrosPorPagina)
    {
        $respuesta = $this->conexion->ejecutarConsulta("SELECT * FROM Genero LIMIT $pagina,$registrosPorPagina;");
        foreach($respuesta as $fila){
            $toReturn[] = $fila;
        }
        return $toReturn;
    }
}