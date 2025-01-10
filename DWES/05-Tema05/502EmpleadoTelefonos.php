<?php
// Copiamos la clase empleado del ejercicio anterior y le añadimos lo nuevo
class Empleado{
    // Atributos de la clase
    private string $nombre;
    private string $apellidos;
    private int $sueldo;
    private array $telefonos = [];

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
    public function vaciarTelefonos(){
        unset($this->telefonos);
        $this -> telefonos = [];
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
    echo "Tiene que pagar impuestos <br>";
}else{
    echo "No tiene que pagar impuestos <br>";
}

$empleado -> anyadirTelefono(634572817);
$empleado -> anyadirTelefono(123456789);
$empleado -> anyadirTelefono(987654321);

echo $empleado -> listarTelefonos(). "<br>";
$empleado -> vaciarTelefonos();
echo $empleado -> listarTelefonos(). "<br>";

?>