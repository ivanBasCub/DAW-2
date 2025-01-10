<?php

class Empleado{
    // Atributos de la clase
    private string $nombre;
    private string $apellidos;
    private int $sueldo;
    private array $telefonos = [];
    private static int $sueldo_tope = 1500;

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
    public function getSueldoTope(){
        return self::$sueldo_tope;
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
    public function setSueldoTope($sueldo_tope){
        self::$sueldo_tope = $sueldo_tope;
    }

    // Funciones
    public function __toString(){
        return "Nombre Completo: " . $this -> nombre . " " . $this -> apellidos . " Sueldo: " . $this -> sueldo;
    }


    public function getNombreCompleto() : string{
        return $this -> nombre . " " . $this -> apellidos;
    }

    public function debePagarImpuestos() : bool{
        if($this -> sueldo > self::$sueldo_tope){
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

?>