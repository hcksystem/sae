<?php
include_once('../routers/RouterPrincipal.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: *");
$r1 = new RouterPrincipal();
echo $r1->route();