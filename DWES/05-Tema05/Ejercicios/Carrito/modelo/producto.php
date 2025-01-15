<?php
class Producto {
    private int $id;
    private string $nombre;
    private $precio;
    private int $cantidad = 1;

    // Constructor
    public function __construct(int $id,string $nombre, $precio){
        $this -> setId($id);
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
    public function getCantidad() : int{
        return $this -> cantidad;
    }
    public function getId() : int{
        return $this -> id;
    }

    public function setNombre(string $nombre){
        $this -> nombre = $nombre;
    }
    public function setPrecio($precio){
        $this -> precio = $precio;
    }
    public function setCantidad(int $cantidad){
        $this -> cantidad = $cantidad;
    }
    public function setId(int $id){
        $this -> id = $id;
    }
}
?>