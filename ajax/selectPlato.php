<?php

    header("Content-Type: application/json");
    require '../require/comun.php'; 
    $bd = new BaseDatos();  
    $modelo = new modeloPlato($bd);   
    $id = Leer::post("id");
    if($id==null){
        echo "{'error':-1}";
        exit();
    }
    $plato = $modelo->get($id);
    echo $plato->getJSON();
    $bd->closeConexion();


