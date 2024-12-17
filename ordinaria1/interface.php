<?php

interface iMuestra {
    public function muestra();
}

class Producto {
    public $codigo;
    public $nombre;
    public $nombre_corto;
    public $pvp;
    public $pulgadas;
    public function __construct($row) {
        $this->codigo = $row['cod'];
        $this->nombre = $row['nombre'];
        $this->nombre_corto = $row['nombre_corto'];
        $this->pvp = $row['pvp'];
        $this->pulgadas = 11;
    }
    public function muestra() {
        echo "<p>" . $this->codigo . "</p>";
    }
}

class TV extends Producto implements iMuestra {
    public function muestra() {
        echo "<p>" . $this->pulgadas . " pulgadas</p>";
    }
}

$tv = new TV(['cod'=>'cod', 'nombre'=>'nombre', 'nombre_corto'=>'nombre_corto','pvp'=>'pvp']);
$tv->muestra();