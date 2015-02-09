<?php

    header("Content-Type: application/json");
    require '../require/comun.php'; 
    $bd = new BaseDatos();  
    $modelo = new modeloPlato($bd);   
    $nombre = Leer::post("nombre");
    $descripcion = Leer::post("descripcion");
    $precio = Leer::post("precio");
    
    $subir = new SubirMultiple("archivos");

    $subir->addExtension("jpg");
    $subir->addExtension("png");
    $subir->addTipo("image/jpeg");
    $subir->addTipo("image/png");
    $subir->setNuevoNombre(time());
    $subir->setAcccion(1);
    $subir->setAccionExcede(1);
    $subir->setTamanio(1024*1024*5);
    $subir->setCantidadMaxima(10);
    $subir->setCrearCarpeta(true);
    $subir->setDestino("../imagenes");
    $subir->subir();
    $fotos = $subir->getNombres();

    $plato = new Plato(null, $nombre, $descripcion, $precio, $fotos);
    $r = $modelo->add($plato);
    $plato->setId($r);
    $s = $modelo->addFoto($plato);
    echo $plato->getJSON();
    $bd->closeConexion();