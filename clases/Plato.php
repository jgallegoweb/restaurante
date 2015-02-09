<?php

/**
 * Description of Plato
 *
 * @author Javier
 */
class Plato {
    private $id, $nombre, $descripcion, $precio, $fotos;
    function __construct($id=null, $nombre=null, $descripcion=null, $precio=null, $fotos=null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->fotos = $fotos;
    }
    
    function set($datos, $inicio=0){
        $this->id=$datos[0 + $inicio];
        $this->nombre=$datos[1 + $inicio];
        $this->descripcion=$datos[2 + $inicio];
        $this->precio=$datos[3 + $inicio];
        /*$this->fotos=$datos[4 + $inicio];*/
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getFotos() {
        return $this->fotos;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setFotos($fotos) {
        $this->fotos = $fotos;
    }
    
    public function getJSON(){
        $prop = get_object_vars($this);
        $resp = "{";
        foreach ($prop as $key => $value){
            $resp.='"'.$key.'":'.json_encode($value).',';
            //htmlspecialchars_decode()
        }
        $resp = substr($resp, 0, -1)."}";
        return $resp;
    }
}
