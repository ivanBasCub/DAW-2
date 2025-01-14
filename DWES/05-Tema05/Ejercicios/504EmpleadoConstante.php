<?php

class Empleado{
    // Atributos de la clase
    private string $nombre;
    private string $apellidos;
    private int $sueldo;
    private array $telefonos = [];
    private const SUELDO_TOPE = 1500;

    // Construtor
    public function __construct(string $nombre, string $apellidos, int $sueldo = 1000){
        $this -> setNombre($nombre);
        $this -> setApellidos($apellidos);
        $this -> setSueldo($sueldo);
    }


    // Getters
    public function getNombre() : string{
        return $this -> nombre;
    }
    public function getApellidos() : string{
        return $this -> apellidos;
    }
    public function getSueldo() : int{
        return $this -> sueldo;
    }
    public function listarTelefonos(){
        if(count($this -> telefonos) != 0){
            return var_dump($this->telefonos);
        }else{
            return "";
        }
    }
    // Setters
    public function setNombre(string $nombre){
        $this -> nombre = $nombre;
    }
    public function setApellidos(string $apellidos){
        $this -> apellidos = $apellidos;
    }
    public function setSueldo(int $sueldo){
        $this -> sueldo = $sueldo;
    }
    public function anyadirTelefono(int $telefono){
        array_push($this -> telefonos,$telefono);
    }
    // Funciones
    public function __toString(){
        return "Nombre Completo: " . $this -> nombre . " " . $this -> apellidos . " Sueldo: " . $this -> sueldo;
    }


    public function getNombreCompleto() : string{
        return $this -> nombre . " " . $this -> apellidos;
    }

    public function debePagarImpuestos() : bool{
        if($this -> sueldo > self::SUELDO_TOPE){
            return true;
        }else{
            return false;
        }
    }
    public function vaciarTelefonos(){
        unset($this->telefonos);
        $this -> telefonos = [];
    }
}

// Main
$empleado = new Empleado("Ivan","Bascones Cubillo",1600);

if($empleado -> debePagarImpuestos()){
    echo "Tiene que pagar impuestos";
}else{
   echo "No tiene que pagar impuestos";
} 
?>