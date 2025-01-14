<?php
    class Persona{
        private string $nombre;
        private string $apellidos;

        // Constructor 
        public function __construct(string $nombre, string $apellidos){
            $this -> setNombre($nombre);
            $this -> setApellidos($apellidos);
        }

        // Getters y Setters
        public function getNombre() : string{
            return $this -> nombre;
        }
        public function getApellidos() : string{
            return $this -> apellidos;
        }
        public function setNombre(string $nombre){
            $this -> nombre = $nombre;
        }
        public function setApellidos(string $apellidos){
            $this -> apellidos = $apellidos;
        }
    }

    class Empleado extends Persona{
        private int $sueldo;
        private array $telefonos = [];

        // Constructor
        public function __construct(string $nombre,string $apellidos,int $sueldo, int $telefono){
            parent::__construct($nombre,$apellidos);
            $this -> setSueldo($sueldo);
            $this -> anyadirTelefono($telefono);
        }

        // Getters y Setters
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
        public function setSueldo(int $sueldo){
            $this -> sueldo = $sueldo;
        }
        public function anyadirTelefono(int $telefono){
            array_push($this -> telefonos,$telefono);
        }

        public function __toString(){
            return "Nombre Completo: " . $this -> getNombre() . " " . $this -> getApellidos() . ", Sueldo: " . $this -> sueldo;
        }
    }

$empleado = new Empleado("Ivan","Bascones Cubillo",2000,634572817);

echo $empleado;

?>