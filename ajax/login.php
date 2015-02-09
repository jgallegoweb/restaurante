<?php

header("Content-Type: application/json");
//header("Content-Type: txt/plain");
require '../require/comun.php';
$sesion = new Sesion();
$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);

$login = Leer::post("login");
$clave = Leer::post("clave");

if($login == "" || $clave == ""){
    if($sesion->isAutentificado()){
        echo '{"estado": "logueado"}';
        exit();
    }else{
        echo '{"estado": "pedir"}';
        exit();
    }
    
}

if(Validar::isCorreo($login)){
    $param['email']=$login;
    $filas = $modelo->getList("email=:email", $param);
    if(sizeof($filas)>0){
        $login = $filas[0]->getLogin();
    }
}

$objeto = $modelo->get($login);
if($objeto->getLogin() == null || !$objeto->getIsactivo()){
    echo '{"estado": "noexiste"}';
    exit();
}
if(!Util::isPass($clave, $objeto->getClave())){
    echo '{"estado": "noclave"}';
    exit();
}

$sesion->setAutentificado(true);
$modelo->setFechaLogin($login);
//$modelo->setControl($login, "Inicio sesión");
$sesion->setUsuario($objeto);
echo '{"estado": "logueado"}';
