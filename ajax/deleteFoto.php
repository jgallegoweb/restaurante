<?php

    header("Content-Type: application/json");
    require '../require/comun.php'; 
    $bd = new BaseDatos();  
    $modelo = new modeloPlato($bd);   
    $idplato = Leer::post("idplato");
    $nombre = Leer::post("nombre");
    if($idplato==null){
        echo '{"error": -1}';
        exit();
    }
    
    $r = $modelo->deleteFoto($idplato, $nombre);
    
    echo '{"error": '.$r.'}';
    $bd->closeConexion();

