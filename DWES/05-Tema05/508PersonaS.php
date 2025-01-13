<?php
    class Persona{
        private string $nombre;
        private string $apellidos;
        private int $edad;

        // Constructor 
        public function __construct(string $nombre, string $apellidos,int $edad){
            $this -> setNombre($nombre);
            $this -> setApellidos($apellidos);
            $this -> setEdad($edad);
        }

        // Getters y Setters
        public function getNombre() : string{
            return $this -> nombre;
        }
        public function getApellidos() : string{
            return $this -> apellidos;
        }
        public function getEdad() : string{
            return $this -> edad;
        }
        public function setEdad(int $edad){
            $this -> edad = $edad;
        }
        public function setNombre(string $nombre){
            $this -> nombre = $nombre;
        }
        public function setApellidos(string $apellidos){
            $this -> apellidos = $apellidos;
        }

        public function __toString() : string{
            return "Nombre Completo: ". $this -> getNombre() . " " . $this -> getApellidos(). ", Edad: " . $this -> getEdad();
        }
    }

    class Empleado extends Persona{
        private int $sueldo;
        private array $telefonos = [];

        // Constructor
        public function __construct(string $nombre,string $apellidos,int $edad,int $sueldo, int $telefono){
            parent::__construct($nombre,$apellidos,$edad);
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

        public function debePagarImpuestos() : string{
            if($this -> getEdad() > 21 && $this -> getSueldo() > 1500){
                return "Si";
            }else{
                return "No";
            }
        }

        // To String
        public function __toString(){
            return parent::__toString() . ", Sueldo: " . $this -> getSueldo() .", Pagar Impuestos: ". $this -> debePagarImpuestos() . ", Telefonos: <br>" . $this -> listarTelefonos();
        }
    }
    
    $empleado = new Empleado("Ivan","Bascones",22,1600,634572817);

    echo $empleado;

?>