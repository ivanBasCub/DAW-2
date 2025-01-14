<?php
class Producto {
    private string $nombre;
    private $precio;

    // Constructor
    public function __construct(string $nombre, $precio){
        $this -> setNombre($nombre);
        $this -> setPrecio($precio);
    }

    // Getters y Setters
    public function getNombre() : string{
        return $this -> nombre;
    }
    public function getPrecio(){
        return $this -> precio;
    }

    public function setNombre(string $nombre){
        $this -> nombre = $nombre;
    }
    public function setPrecio($precio){
        $this -> precio = $precio;
    }
}
?>