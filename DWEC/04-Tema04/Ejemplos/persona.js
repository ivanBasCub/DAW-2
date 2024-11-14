"use strict"

// Crear un objeto "a mano"
let persona = {
    nombre: "Juan",
    apellido: "Perez",
    edad: 25,
    direccion: {
        calle: "Av. Independencia",
        numero: 154
    }
}

console.log("=== Persona creada a mano ===");
console.log(persona);

// Crear una factoría de objetos
function crearPersona(nombre, apellido, edad) {
    return {
        nombre: nombre,
        apellido: apellido,
        edad: edad
    }
}


// ---
// OBJETOS TRADICIONALES
// ---

console.log("=== OBJETOS TRADICIONALES ===");

// Crear un objeto con constructor
function Persona(nombre, apellido, edad) {
    this.nombre = nombre;
    this.apellido = apellido;
    this.edad = edad;
}

// Inicializa una instancia de Persona
let p1 = new Persona("Juan", "Perez", 25);

console.log("=== Persona p1 ===");
console.log(p1);

// ---

// Crear un objeto con constructor y método
function Persona2(nombre, apellido, edad) {
    this.nombre = nombre;
    this.apellido = apellido;
    this.edad = edad;
    this.saludar = function() {
        console.log("Hola, soy " + this.nombre);
    }
}

// Inicializa una instancia de Persona2
let p2 = new Persona2("Maria", "Gomez", 30);

console.log("=== Persona p2 ===");
console.log(p2);
p2.saludar();

// ---

// Crear un objeto que hereda de Persona2
function Empleado(nombre, apellido, edad, puesto) {
    Persona2.call(this, nombre, apellido, edad);
    this.puesto = puesto;
    this.trabajar = function() {
        console.log("Estoy trabajando como " + this.puesto);
    }    
}    

// Inicializa una instancia de Empleado
let e1 = new Empleado("Pedro", "Lopez", 35, "Gerente");

console.log("=== Empleado e1 ===");
console.log(e1);
e1.saludar();
e1.trabajar();

// ---

// Agregar método toString() a Persona2
Persona2.prototype.toString = function() {
    return this.nombre + " " + this.apellido;
}

console.log("=== Persona p2 con método toString ===");
console.log(p2.toString());


// Agregar propiedades a un objeto
p1.telefono = "123456789";

console.log("=== Agregar propiedad telefono a p1 ===");
console.log(p1);

// Eliminar propiedades de un objeto
delete p1.telefono;

console.log("=== Eliminar propiedad telefono de p1 ===");
console.log(p1);


// ---
// CLASES
// ---

console.log("=== CLASES ===");

// Crear una clase
class Persona3 {
    constructor(nombre, apellido, edad) {
        this.nombre = nombre;
        this.apellido = apellido;
        this.edad = edad;
    }

    saludar() {
        console.log("Hola, soy " + this.nombre);
    }
}

// Inicializa una instancia de Persona3
let p3 = new Persona3("Ana", "Rodriguez", 28);

console.log("=== Persona p3 ===");
console.log(p3);
p3.saludar();

// ---

// Crear una clase que hereda de Persona3
class Empleado2 extends Persona3 {
    constructor(nombre, apellido, edad, puesto) {
        super(nombre, apellido, edad);
        this.puesto = puesto;
    }

    trabajar() {
        console.log("Estoy trabajando como " + this.puesto);
    }
}

// Inicializa una instancia de Empleado2
let e2 = new Empleado2("Carlos", "Garcia", 40, "Jefe");

console.log("=== Empleado e2 ===");
console.log(e2);
e2.saludar();
e2.trabajar();


// ---
// OPERACIONES CON OBJETOS
// ---

// Crear un objeto a partir de otro
let p5 = Object.create(p3);
console.log("=== Crear objeto p5 a partir de p3 ===");
console.log(p5);

// Clonar un objeto
let p4 = Object.assign({}, p3);
console.log("=== Clonar objeto p3 en p4 ===");
console.log(p4);

// Comparar objetos
console.log("=== Comparar objetos p3 y p4 ===");
console.log("p3 === p4 es " + (p3 === p4));
console.log("p3 es igual a como objeto p4 es " + (JSON.stringify(p3) === JSON.stringify(p4)));

// Iterar sobre las propiedades de un objeto
console.log("=== Iterando sobre las propiedades de p3 ===");
for (let key in p3) {
    console.log(key + ": " + p3[key]);
}

// Obtener las propiedades de un objeto
let props = Object.keys(p3);
console.log("=== Propiedades de p3 ===");
console.log(props);

// Obtener los valores de un objeto
let values = Object.values(p3);
console.log("=== Valores de p3 ===");
console.log(values);

// Comprobar si un objeto tiene una propiedad
let hasNombre = p3.hasOwnProperty("nombre");
console.log("=== p3 tiene propiedad nombre ===");
console.log(hasNombre);

// Comprobar el prototipo de un objeto
let isPersona3 = p3 instanceof Persona3;
console.log("=== p3 es instancia de Persona3 ===");
console.log(isPersona3);

// Mostrar el prototipo de un objeto
let proto = Object.getPrototypeOf(p3);
console.log("=== Prototipo de p3 ===");
console.log(proto);
console.log(p3.__proto__);

// Mostrar el constructor de un objeto
let constructor = p3.constructor;
console.log("=== Constructor de p3 ===");
console.log(constructor);

// Mostrar el nombre del constructor de un objeto (clase)
let constructorName = p3.constructor.name;
console.log("=== Nombre del constructor de p3 ===");
console.log(constructorName);

// JSON
let json = JSON.stringify(p3);
console.log("=== JSON de p3 ===");
console.log(json);

let p6 = JSON.parse(json);
console.log("=== Objeto a partir de JSON ===");
console.log(p6);