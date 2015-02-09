<?php

/**
 * Description of modeloPlato
 *
 * @author Javier
 */
class modeloPlato {
    private $bd, $tabla="platos", $tablafotos="fotos";
    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }
    function add(Plato $plato){
        $sql = "INSERT INTO $this->tabla VALUES (null, :nombre, :descripcion, :precio)";
        $param['nombre'] = $plato->getNombre();
        $param['descripcion'] = $plato->getDescripcion();
        $param['precio'] = $plato->getPrecio();
        $r=$this->bd->setConsulta($sql, $param);
        if(!$r){
            return -1;
        }
        return $this->bd->getAutonumerico();
    }
    function addFoto(Plato $objeto){
        $sql = "INSERT INTO $this->tablafotos VALUES(null, :idplato, :nombre)";
        $arrayfotos = $objeto->getFotos();
        $error=0;
        foreach($arrayfotos as $key => $foto){
            $param['idplato']=$objeto->getId();
            $param['nombre']=$foto;
            $r=$this->bd->setConsulta($sql, $param);
            if(!$r){
                $error=-1;
            }
        }
        //devuelve -1 si alguna inserción falló
        return $error;
    }
    function delete($id){
        $nombres = $this->getNombreFotos($id);
        foreach ($nombres as $nombre){
            unlink("../imagenes/".$nombre);
        }
        $sql = "DELETE FROM $this->tabla WHERE id=:id";
        $param['id'] = $id;
        $r=$this->bd->setConsulta($sql, $param);
        if(!$r){
            return -1;
        }
        return $this->bd->getNumeroFilas();
    }
    function deleteFoto($idplato, $nombre){
        unlink("../imagenes/".$nombre);
        $sql = "DELETE FROM $this->tablafotos WHERE idplato=:idplato and nombre=:nombre";
        $param['idplato'] = $idplato;
        $param['nombre'] = $nombre;
        $r=$this->bd->setConsulta($sql, $param);
        if(!$r){
            return -1;
        }
        return $this->bd->getNumeroFilas();
    }
    function update(Plato $plato){
        $sql = "UPDATE $this->tabla SET nombre=:nombre, descripcion=:descripcion, precio=:precio WHERE id=:id";
        $param['id'] = $plato->getId();
        $param['nombre'] = $plato->getNombre();
        $param['descripcion'] = $plato->getDescripcion();
        $param['precio'] = $plato->getPrecio();
        $r=$this->bd->setConsulta($sql, $param);
        if(!$r){
            return -1;
        }
        return $this->bd->getNumeroFilas();
    }
    
    function count($condicion = "1=1", $parametros = array()) {
        $sql = "select count(*) from $this->tabla where $condicion";
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            $x = $this->bd->getFila();
            return $x[0];
        }
        return -1;
    }
    
    function get($id){
        $sql = "SELECT * FROM $this->tabla where id=:id";
        $param['id']=$id;
        $r=$this->bd->setConsulta($sql, $param);
        if($r){
            $plato = new Plato();
            $plato->set($this->bd->getFila());
            $plato->setFotos($this->getNombreFotos($id));
            return $plato;
        }
        return null;
    }
    /********************************************************************************************/
    private function getNombreFotos($id){
        $list = array();
        $sql = "select * from $this->tablafotos where idplato=:idplato";
        $param['idplato']=$id;
        $r = $this->bd->setConsulta($sql, $param);
        if($r){
            while($fila = $this->bd->getFila()){
                $list[] = $fila[2];
            }
        }else{
            return null;
        }
        return $list;
    }
    /********************************************************************************************/
    function getList($condicion="1=1", $parametro=array(), $orderby = "1"){
        $list = array();
        $sql = "select * from $this->tabla where $condicion order by $orderby";
        $r = $this->bd->setConsulta($sql, $parametro);
        if($r){
            while($fila = $this->bd->getFila()){
                $plato = new Plato();
                $plato->set($fila);
                $plato->setFotos($this->getNombreFotos($id));
                $list[] = $plato;
            }
        }else{
            return null;
        }
        return $list;
    }
    function getListJSON($pagina=0, $rpp=3, $condicion="1=1", $parametro=array(), $orderby = "1"){
        $principio = $pagina*$rpp;
        $sql = "select * from $this->tabla where $condicion order by $orderby limit $principio,$rpp";
        /*$sql = "select * from $this->tabla p "
                . "left join fotos f "
                . "on p.id = f.idplato "
                . "where $condicion order by $orderby limit $principio,$rpp";*/
        $this->bd->setConsulta($sql, $parametro);
        /*$foto = array();*/
        $r = "[ ";
        while($fila = $this->bd->getFila()){
            $bd2 = new BaseDatos();
            $modelo2 = new modeloPlato($bd2);
            $plato = new Plato();
            $plato->set($fila);
            
            $fotos = $modelo2->getNombreFotos($plato->getId());
            $plato->setFotos($fotos);
            $r .= $plato->getJSON() . ",";
        }
        $r = substr($r, 0, -1)."]";
        return $r;
    }
}
