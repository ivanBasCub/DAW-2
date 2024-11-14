"use strict"

// Constructor Vehiculo
function Vehiculo(matricula, ruedas, pasajeros){
    // Para indicar que ese atributo actue o se use como un atributo privado
    this._matricula = matricula;
    this.ruedas = ruedas;
    //Para que se interprete como un atributo privado y se tiene que declarar antes
    this.#pasajeros = pasajeros;
    /* Declarar getter y setter 
    get pasajeros(){return this.#puesto};
    set pasajeros(value){this.#pasajeros = value}
    */
}

Vehiculo.prototype.num_ruedas = function(){
    console.log(`Tengo ${this.ruedas}`);
}

// Constructor Coche <- Vehiculo
function Coche(matricula, ruedas, pasajeros, marca, combustible){
    Vehiculo.call(this,matricula,ruedas,pasajeros);
    this.marca = marca;
    this.combustible = combustible;
}
// Constructor Moto <- Vehiculo
function Moto(matricula, ruedas, pasajeros, marca, combustible){
    Vehiculo.call(this,matricula,ruedas,pasajeros);
    this.marca = marca;
    this.combustible = combustible;
}
// Constructo Locomotora <- Vehiculo
function Locomotora(matricula, ruedas, pasajeros, marca, combustible){
    Vehiculo.call(this,matricula,ruedas,pasajeros);
    this.marca = marca;
    this.combustible = combustible;
}
