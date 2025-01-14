<?php
// Creamos la clase Empleado
class Empleado{
    // Atributos de la clase
    private string $nombre;
    private string $apellidos;
    private int $sueldo;

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

    // Funciones
    public function getNombreCompleto() : string{
        return $this -> nombre . " " . $this -> apellidos;
    }

    public function debePagarImpuestos() : bool{
        if($this -> sueldo > 1500){
            return true;
        }else{
            return false;
        }
    }
}


// Main
$empleado = new Empleado();

$empleado -> setNombre("Ivan");
$empleado -> setApellidos("Bascones Cubillo");
$empleado -> setSueldo(1500);

// Imprimimos las funciones que hemos creado
echo $empleado -> getNombreCompleto() . "<br>";

if($empleado -> debePagarImpuestos()){
    echo "Tiene que pagar impuestos";
}else{
    echo "No tiene que pagar impuestos";
}


?>