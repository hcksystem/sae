<?php
include_once('../routers/RouterPrincipal.php');
header("Access-Control-Allow-Origin: *");
$r1 = new RouterPrincipal();
echo $r1->route();