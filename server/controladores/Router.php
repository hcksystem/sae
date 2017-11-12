<?php
// trae EL METODO DE SOLICITUD HTTP GET o POST o PUT o DELETE
$method = $_SERVER['REQUEST_METHOD'];

$ruta = explode('?',$_SERVER['REQUEST_URI'])[0];
$variablespath = explode('?',$_SERVER['REQUEST_URI'])[1];
$variables = explode('&',$variablespath);
foreach($variables as $variable){
    $argumentos[] = array("nombre"=>explode('=',$variable)[0],"valor"=>explode('=',$variable)[1]);
}
$body = json_decode(file_get_contents('php://input'),true);
$header = getallheaders();
$partesRuta=explode('/',$ruta);
$accion = $partesRuta[count($partesRuta)-1];
$controlador = $partesRuta[count($partesRuta)-2];
echo "<br/>CONTROLADOR: ".$controlador;
echo "<br/>ACCION: ".explode('.',$accion)[0];
echo "<br/>ARGUMENTOS: ".json_encode($argumentos);
echo "<br/>BODY: <br/>";
echo var_dump($body);
echo "<br/>HEADER: <br/>";
echo var_dump($header["Authorization"]);
/*
$table = preg_replace('/[^a-z0-9_]+/i','',array_shift($ruta));
$key = array_shift($request)+0;
$columns = preg_replace('/[^a-z0-9_]+/i','',array_keys($input));
$values = array_map(function ($value) use ($link) {
switch ($method) {
  case 'GET':
    $sql = "select * from `$table`".($key?" WHERE id=$key":''); break;
  case 'PUT':
    $sql = "update `$table` set $set where id=$key"; break;
  case 'POST':
    $sql = "insert into `$table` set $set"; break;
  case 'DELETE':
    $sql = "delete `$table` where id=$key"; break;
}
});*/