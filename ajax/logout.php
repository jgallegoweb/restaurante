<?php

header("Content-Type: application/json");
//header("Content-Type: txt/plain");
require '../require/comun.php';
$sesion = new Sesion();
$sesion->salir();
echo '{"estado": "logout"}';

