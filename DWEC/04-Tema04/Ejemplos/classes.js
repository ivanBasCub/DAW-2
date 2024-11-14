class Vehiculo{
    // Atributos privados
    #matricula = "";
    // Constructor de la clase
    constructor(matricula,ruedas,pasajeros){
        this.#matricula = matricula;
        this.ruedas = ruedas;
        this.pasajeros = pasajeros;
    }

    // Getters y setters para matricula
    get matricula(){return this.#matricula};
    set matricula(matricula){this.#matricula = matricula}

}

// instanceof es para saber que clase es la que nos viene el obejto

// Herencia de una clase a otra
class Coche extends Vehiculo{
    
}