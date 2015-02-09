<?php

    header("Content-Type: application/json");
    require '../require/comun.php'; 
    $bd = new BaseDatos();  
    $modelo = new modeloPlato($bd);   
    $pagina = Leer::post("pagina");
    if($pagina==null){
        $pagina = 0;
    }
    $enlaces = Paginacion::getEnlacesPaginacionJSON($pagina, $modelo->count(), Configuracion::RPP);
    $respuesta = '{';
    $respuesta .= '"paginas":'.  json_encode($enlaces).',';
    $respuesta .= '"platos":'.$modelo->getListJSON($pagina, Configuracion::RPP).'}';
    echo $respuesta;
    $bd->closeConexion();

